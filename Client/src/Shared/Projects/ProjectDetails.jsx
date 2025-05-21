import { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { motion } from 'framer-motion';
import { FaArrowLeft, FaCheckCircle } from 'react-icons/fa';
import CommonHero from '../CommonHero';

const parseJSON = (data) => {
    try {
        return typeof data === "string" ? JSON.parse(data) : data;
    } catch {
        return [];
    }
};

const ProjectDetails = () => {
    const { slug } = useParams();
    const navigate = useNavigate();
    const [project, setProject] = useState(null);
    const [loading, setLoading] = useState(true);
    const [notFound, setNotFound] = useState(false);
    const [isImageHovered, setIsImageHovered] = useState(false);

    useEffect(() => {
        const fetchProject = async () => {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/projects");
                const data = await response.json();

                const found = data.find(p => p.slug === slug);

                if (found) {
                    found.features = parseJSON(found.features);
                    found.technologies = parseJSON(found.technologies);
                    setProject(found);
                } else {
                    setNotFound(true);
                }
            } catch (error) {
                console.error("Error fetching project:", error);
                setNotFound(true);
            } finally {
                setLoading(false);
            }
        };

        fetchProject();
    }, [slug]);

    const handleBack = () => navigate(-1);

    if (loading) return <div className="text-center py-10">Loading...</div>;
    if (notFound) return <div className="text-center text-red-500 py-10">Project not found.</div>;

    return (
        <div>
            <CommonHero title='Completed Project' />
            <div className="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    transition={{ duration: 0.5 }}
                    className="bg-white rounded-xl overflow-hidden shadow-lg"
                >
                    <div className="p-6 md:p-8">
                        <button
                            onClick={handleBack}
                            className="flex items-center text-indigo-900 hover:text-indigo-800 transition-colors mb-6 group"
                        >
                            <motion.div
                                whileHover={{ x: -5 }}
                                transition={{ duration: 0.2 }}
                                className="flex items-center"
                            >
                                <FaArrowLeft className="mr-2 transition-transform group-hover:-translate-x-1" />
                                <span>Back to Projects</span>
                            </motion.div>
                        </button>

                        <div className="mb-8">
                            <h1 className="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                                {project.title}
                            </h1>
                            {project.sub_title && (
                                <p className="text-lg text-indigo-950 font-medium mb-4">
                                    {project.sub_title}
                                </p>
                            )}
                        </div>

                        <div
                            className="relative w-full h-64 md:h-80 lg:h-96 rounded-xl overflow-hidden mb-8 shadow-md"
                            onMouseEnter={() => setIsImageHovered(true)}
                            onMouseLeave={() => setIsImageHovered(false)}
                        >
                            <motion.img
                                src={project.image}
                                alt={project.title}
                                className="w-full h-full object-cover"
                                initial={{ scale: 1 }}
                                animate={{ scale: isImageHovered ? 1.05 : 1 }}
                                transition={{ duration: 0.5 }}
                            />
                        </div>

                        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 p-6 md:p-8">
                            <div className="lg:col-span-2">
                                <div className="prose max-w-none">
                                    <h2 className="text-2xl font-bold text-gray-800 mb-4">Project Overview</h2>
                                    {project.description ? (
                                        <div
                                            className="text-gray-700 mb-6 text-lg leading-relaxed"
                                            dangerouslySetInnerHTML={{ __html: project.description }}
                                        />
                                    ) : (
                                        <p className="text-gray-500">No description available.</p>
                                    )}
                                </div>
                            </div>

                            <div className="lg:col-span-1">
                                <div className="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100">
                                    {project.features?.length > 0 && (
                                        <>
                                            <h3 className="text-xl font-bold text-gray-800 mb-4">Key Features</h3>
                                            <ul className="space-y-3">
                                                {project.features.map((feature, index) => (
                                                    <motion.li
                                                        key={index}
                                                        className="flex items-start"
                                                        whileHover={{ x: 5 }}
                                                        transition={{ type: 'spring', stiffness: 300 }}
                                                    >
                                                        <FaCheckCircle className="text-indigo-900 mt-1 mr-3 flex-shrink-0" />
                                                        <span className="text-gray-700">{feature}</span>
                                                    </motion.li>
                                                ))}
                                            </ul>
                                        </>
                                    )}

                                    {project.technologies?.length > 0 && (
                                        <>
                                            <h3 className="text-xl font-bold text-gray-800 mt-8 mb-4">Technologies Used</h3>
                                            <div className="flex flex-wrap gap-2">
                                                {project.technologies.map((tech, index) => (
                                                    <motion.span
                                                        key={index}
                                                        whileHover={{ y: -3 }}
                                                        className="bg-indigo-100 text-indigo-950 px-3 py-1 rounded-full text-sm font-medium"
                                                    >
                                                        {tech}
                                                    </motion.span>
                                                ))}
                                            </div>
                                        </>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </motion.div>
            </div>
        </div>
    );
};

export default ProjectDetails;
