import { useEffect, useState } from "react";
import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';

const Running = () => {
    const [projects, setProjects] = useState([]);

    const fadeInUp = {
        hidden: { opacity: 0, y: 20 },
        visible: {
            opacity: 1,
            y: 0,
            transition: { duration: 0.6, ease: "easeOut" }
        }
    };

    useEffect(() => {
        fetch("https://server.rst-bd.com/api/projects")
            .then(res => res.json())
            .then(data => {
                const completedProjects = data.filter(project => project.sub_title === "Running");
                setProjects(completedProjects);
            })
            .catch(err => console.error("Failed to fetch projects:", err));
    }, []);

    return (
        <section className="py-5 lg:py-10 md:px-24 lg:px-24 bg-white">
            <div className="container mx-auto px-4">
                {projects.length > 0 ? (
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                        {projects.map((project, index) => (
                            <motion.div
                                key={project.id}
                                initial="hidden"
                                whileInView="visible"
                                viewport={{ once: true }}
                                variants={fadeInUp}
                                transition={{ duration: 0.6, delay: index * 0.2 }}
                                className="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                            >
                                <div className="relative group w-full h-48 overflow-hidden">
                                    <img
                                        src={project.image}
                                        alt={project.title}
                                        className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    />
                                    <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                                </div>
                                <div className="p-6">
                                    <h3 className="text-xl font-semibold mb-3 text-gray-800">
                                        {project.title}
                                    </h3>
                                    <p className="text-gray-600 mb-5">
                                        {project.short}
                                    </p>
                                    <div>
                                        <Link
                                            to={`/projectdetails/${project.slug}`}
                                            className="inline-flex items-center font-bold text-indigo-900 hover:text-indigo-800 transition-colors"
                                        >
                                            View More
                                            <motion.svg whileHover={{ x: 5 }}
                                                className="w-6 h-6 ml-2 text-indigo-950 font-extrabold"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </motion.svg>
                                        </Link>
                                    </div>
                                </div>
                            </motion.div>
                        ))}
                    </div>
                ) : (
                    <p className="text-center text-gray-500 text-lg">No completed projects found.</p>
                )}
            </div>
        </section>
    );
};

export default Running;
