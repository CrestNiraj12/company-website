import React from "react";
import { Head } from "@inertiajs/inertia-react";
import NavBar from "@/Components/NavBar";
import Carousel from "./Carousel";
import About from "./About";
import Projects from "./Projects";
import Footer from "./Footer";

export default function Home(props) {
    const { projects } = props;
    return (
        <>
            <Head title="Homepage" />
            <NavBar auth={props.auth} />
            <Carousel />
            <About />
            <Projects />
        </>
    );
}
