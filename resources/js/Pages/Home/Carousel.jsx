import React from "react";
import Building from "../../../images/building.jpg";
import AwesomeSlider from "react-awesome-slider";
import withAutoplay from "react-awesome-slider/dist/autoplay";
import "react-awesome-slider/dist/styles.css";

export default function Carousel(props) {
    const AutoplaySlider = withAutoplay(AwesomeSlider);

    return (
        <section>
            <AutoplaySlider
                play={true}
                cancelOnInteraction={false}
                interval={2000}
                style={{ height: "40vw" }}
            >
                <div>
                    <img src={Building} alt="Building" />
                </div>
                <div>
                    <img src={Building} alt="Building" />
                </div>
            </AutoplaySlider>
        </section>
    );
}
