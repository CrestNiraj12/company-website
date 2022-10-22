import React from "react";
import { Head } from "@inertiajs/inertia-react";
import NavBar from "@/Components/NavBar";

export default function Guarantees(props) {
    const { guarantees } = props;
    return (
        <>
            <Head title="Projects" />
            <NavBar auth={props.auth} />
        </>
    );
}
