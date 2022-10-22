import { Box, Tabs, Tab, styled } from "@mui/material";
import { tabsClasses } from "@mui/material/Tabs";

export const StyledTabs = styled((props) => (
    <Tabs
        {...props}
        variant="scrollable"
        scrollButtons
        allowScrollButtonsMobile
        TabIndicatorProps={{
            children: <span className="MuiTabs-indicatorSpan" />,
        }}
        sx={{
            width: "100%",
            [`& .${tabsClasses.scrollButtons}`]: {
                width: 10,
                "& .MuiSvgIcon-root.MuiSvgIcon-fontSizeSmall": {
                    color: "white",
                },
                "&.Mui-disabled": { opacity: 0.3 },
            },
        }}
    />
))({
    "& .MuiTabs-indicator": {
        display: "flex",
        justifyContent: "center",
        backgroundColor: "transparent",
    },
    "& .MuiTabs-indicatorSpan": {
        maxWidth: 40,
        width: "100%",
        backgroundColor: "#635ee7",
    },
});

export const StyledTab = styled((props) => <Tab disableRipple {...props} />)(
    ({ theme }) => ({
        textTransform: "none",
        fontWeight: theme.typography.fontWeightRegular,
        fontSize: theme.typography.pxToRem(15),
        marginRight: theme.spacing(1),
        color: "rgba(255, 255, 255, 0.7)",
        "&.Mui-selected": {
            color: "#fff",
        },
        "&.Mui-focusVisible": {
            backgroundColor: "rgba(100, 95, 228, 0.32)",
        },
    })
);

export const TabPanel = (props) => {
    const { children, value, index, ...other } = props;

    return (
        <div
            role="tabpanel"
            hidden={value !== index}
            id={`vertical-tabpanel-${index}`}
            aria-labelledby={`vertical-tab-${index}`}
            {...other}
        >
            {value === index && <Box sx={{ py: 3 }}>{children}</Box>}
        </div>
    );
};
