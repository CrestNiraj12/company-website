import React from "react";
import {
    AppBar,
    Avatar,
    Box,
    Container,
    IconButton,
    Link,
    Menu,
    MenuItem,
    Toolbar,
    Tooltip,
    Typography,
} from "@mui/material";
import MenuIcon from "@mui/icons-material/Menu";
import NavLink from "@/Components/NavLink";
import { PRIMARY, PRIMARY_RED, PRIMARY_YELLOW } from "@/constants";
import ApplicationLogo from "./ApplicationLogo";

const pages = [
    { name: "Home", link: "/" },
    { name: "Projects", link: "/projects" },
    { name: "Guarantees", link: "/guarantees" },
    { name: "Contact", link: "/contact" },
];

const settings = ["Profile", "Logout"];

export default function NavBar({ auth }) {
    const [anchorElNav, setAnchorElNav] = React.useState(null);
    const [anchorElUser, setAnchorElUser] = React.useState(null);

    const handleOpenNavMenu = (e) => {
        setAnchorElNav(e.currentTarget);
    };

    const handleOpenUserMenu = (e) => {
        setAnchorElUser(e.currentTarget);
    };

    const handleCloseNavMenu = (e, link) => {
        if (link[0] !== "/") return;
        window.location.href = link;
        setAnchorElNav(null);
    };

    const handleCloseUserMenu = () => {
        setAnchorElUser(null);
    };

    return (
        <AppBar
            position="static"
            sx={{ backgroundColor: PRIMARY, paddingY: "10px" }}
            elevation={0}
        >
            <Container maxWidth="xl">
                <Toolbar disableGutters>
                    <Toolbar sx={{ display: { xs: "none", md: "flex" } }}>
                        <ApplicationLogo />
                    </Toolbar>
                    <Box
                        sx={{
                            flexGrow: 1,
                            display: { xs: "flex", md: "none" },
                        }}
                    >
                        <IconButton
                            size="large"
                            aria-label="account of current user"
                            aria-controls="menu-appbar"
                            aria-haspopup="true"
                            onClick={handleOpenNavMenu}
                            color="inherit"
                        >
                            <MenuIcon />
                        </IconButton>
                        <Menu
                            id="menu-appbar"
                            anchorEl={anchorElNav}
                            anchorOrigin={{
                                vertical: "bottom",
                                horizontal: "left",
                            }}
                            keepMounted
                            transformOrigin={{
                                vertical: "top",
                                horizontal: "left",
                            }}
                            open={Boolean(anchorElNav)}
                            onClose={handleCloseNavMenu}
                            sx={{
                                display: { xs: "block", md: "none" },
                            }}
                        >
                            {pages.map(({ name, link }) => (
                                <MenuItem
                                    key={link}
                                    onClick={(e) => handleCloseNavMenu(e, link)}
                                >
                                    <Typography textAlign="center">
                                        {name}
                                    </Typography>
                                </MenuItem>
                            ))}
                        </Menu>
                    </Box>
                    <Toolbar
                        sx={{
                            display: { xs: "flex", md: "none" },
                            mr: 4,
                            flex: 1,
                        }}
                    >
                        <ApplicationLogo />
                    </Toolbar>
                    <Box
                        sx={{
                            flexGrow: 1,
                            display: { xs: "none", md: "flex" },
                            justifyContent: "space-evenly",
                            marginInline: { xs: 0, md: "20%" },
                        }}
                    >
                        {pages.map(({ name, link }) => (
                            <React.Fragment key={link}>
                                <NavLink
                                    href={link}
                                    active={route().current(name.toLowerCase())}
                                >
                                    {name}
                                </NavLink>
                            </React.Fragment>
                        ))}
                    </Box>

                    <Box sx={{ flexGrow: 0 }}>
                        <Tooltip title="Open settings">
                            {auth.user ? (
                                <IconButton
                                    onClick={handleOpenUserMenu}
                                    sx={{ p: 0 }}
                                >
                                    <Avatar
                                        alt="Remy Sharp"
                                        src="/static/images/avatar/2.jpg"
                                    />
                                </IconButton>
                            ) : (
                                <Link
                                    href={route("login")}
                                    underline="none"
                                    variant="contained"
                                    sx={[
                                        {
                                            padding: "10px 20px",
                                            borderRadius: "5px",
                                            color: "white",
                                            backgroundColor: PRIMARY_RED,
                                            transition:
                                                "background-color 0.2s ease-in",
                                        },
                                        {
                                            "&:hover": {
                                                backgroundColor: PRIMARY_YELLOW,
                                            },
                                        },
                                    ]}
                                >
                                    Login
                                </Link>
                            )}
                        </Tooltip>
                        <Menu
                            sx={{ mt: "45px" }}
                            id="menu-appbar"
                            anchorEl={anchorElUser}
                            anchorOrigin={{
                                vertical: "top",
                                horizontal: "right",
                            }}
                            keepMounted
                            transformOrigin={{
                                vertical: "top",
                                horizontal: "right",
                            }}
                            open={Boolean(anchorElUser)}
                            onClose={handleCloseUserMenu}
                        >
                            {settings.map((setting) => (
                                <MenuItem
                                    key={setting}
                                    onClick={handleCloseUserMenu}
                                >
                                    <Typography textAlign="center">
                                        {setting}
                                    </Typography>
                                </MenuItem>
                            ))}
                        </Menu>
                    </Box>
                </Toolbar>
            </Container>
        </AppBar>
    );
}
