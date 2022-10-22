import React from "react";
import Logo from "../../images/logo.jpg";

export default function ApplicationLogo({ className }) {
    return (
        <img
            src={Logo}
            alt="logo"
            style={{ maxWidth: 80 }}
            className={className}
        />
    );
}
