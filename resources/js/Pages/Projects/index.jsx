import React from "react";
import { Head } from "@inertiajs/inertia-react";
import NavBar from "@/Components/NavBar";
import AllProjects from "./AllProjects";

export default function Projects(props) {
    const { projects } = props;
    return (
        <>
            <Head title="Projects" />
            <NavBar auth={props.auth} />
            <AllProjects projects={projects} />
        </>
    );
}
