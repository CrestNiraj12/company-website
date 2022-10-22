import { categories } from "@/constants";

export default function Projects(props) {
    return (
        <section className="sm:pb-24 pt-5 pb-10 lg:px-40 sm:px-20 px-10">
            <h2 className="font-bold md:text-3xl text-2xl text-center md:text-left mb-10">
                Projects
            </h2>
            <div className="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-10">
                {categories.map(({ id, image, name }) => (
                    <a
                        key={id}
                        href={"/projects/?filter=" + name.toLowerCase()}
                    >
                        <div className="rounded hover:scale-105 transition ease-in">
                            <img
                                src={image}
                                alt="Project Image"
                                className="w-full h-52 md:h-full mb-3 rounded-md object-cover"
                            />
                            <p className="text-center text-gray-300 font-bold text-lg tracking-wide">
                                {name}
                            </p>
                        </div>
                    </a>
                ))}
            </div>
        </section>
    );
}
