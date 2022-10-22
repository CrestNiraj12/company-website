import { categories } from "@/constants";
import { Box } from "@mui/material";
import React, { useState } from "react";
import { StyledTab, StyledTabs, TabPanel } from "./TabUtils";

export default function AllProjects(props) {
    const [value, setValue] = useState(0);

    const handleChange = (e, value) => {
        setValue(value);
    };

    return (
        <section className="mb-20">
            <Box sx={{ paddingY: 2.5 }} className="p-8 md:p-12">
                <div className="flex justify-between md:flex-row flex-col">
                    <div>
                        <StyledTabs
                            value={value}
                            onChange={handleChange}
                            aria-label="Projects"
                        >
                            <StyledTab label="All Projects" />
                            {categories.map(({ id, name }) => (
                                <StyledTab key={id} label={name} />
                            ))}
                        </StyledTabs>
                    </div>

                    <div className="md:ml-5 md:mt-0 mt-5">
                        <label
                            htmlFor="default-search"
                            className="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300"
                        >
                            Search
                        </label>
                        <div className="relative">
                            <div className="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg
                                    aria-hidden="true"
                                    className="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    ></path>
                                </svg>
                            </div>
                            <input
                                type="search"
                                id="default-search"
                                className="block p-4 pl-10 mr-5 w-full text-sm rounded-lg border  focus:ring-secondary focus:border-secondary bg-gray-700 border-gray-600 placeholder-gray-400 text-white "
                                placeholder="Search Projects"
                                required
                            />
                            <button
                                type="submit"
                                className="text-white bg-secondary hover:bg-secondary-light absolute right-2.5 bottom-2.5 transition ease-in focus:outline-none font-medium rounded-lg text-sm px-4 py-2"
                            >
                                Search
                            </button>
                        </div>
                    </div>
                </div>
                {categories.map((category, index) => (
                    <TabPanel key={category.id} value={value} index={index}>
                        <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-10 gap-y-16">
                            {category.projects.map(({ id, image, name }) => (
                                <div
                                    key={id}
                                    className="rounded hover:scale-105 transition ease-in"
                                >
                                    <img
                                        src={image}
                                        alt="Project Image"
                                        className="w-full h-full mb-3 rounded-md object-cover"
                                    />
                                    <p className="text-center text-gray-300 font-bold text-lg tracking-wide">
                                        {name}
                                    </p>
                                </div>
                            ))}
                        </div>
                    </TabPanel>
                ))}
            </Box>
        </section>
    );
}
