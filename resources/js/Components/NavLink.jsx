import React from "react";
import { Link } from "@mui/material";
import { PRIMARY_YELLOW } from "@/constants";

export default function NavLink({ href, active, children }) {
    return (
        <Link
            underline="none"
            href={href}
            sx={{
                letterSpacing: 0.5,
                textTransform: "uppercase",
                fontWeight: "bold",
                my: 2,
                color: active ? PRIMARY_YELLOW : "white",
                display: "block",
            }}
        >
            {children}
        </Link>
    );
}
