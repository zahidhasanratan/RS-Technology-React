import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { motion } from "framer-motion";
import { FaArrowRight } from "react-icons/fa";
import CommonHero from "./CommonHero";

const SingleSolution = () => {
    const { serviceSlug } = useParams();

    const [solutions, setSolutions] = useState([]);
    const [selectedSolution, setSelectedSolution] = useState(null);
    const [loading, setLoading] = useState(true);

    // Fetch all services for the sidebar
    useEffect(() => {
        const fetchSolutions = async () => {
            try {
                const res = await fetch("http://127.0.0.1:8000/api/solution");
                const data = await res.json();
                setSolutions(data);
            } catch (error) {
                console.error("Failed to fetch all solutions:", error);
            }
        };
        fetchSolutions();
    }, []);

    // Fetch the selected solution based on slug
    useEffect(() => {
        const fetchSolutionBySlug = async () => {
            setLoading(true);
            try {
                const res = await fetch(`http://127.0.0.1:8000/api/solution/${serviceSlug}`);
                if (!res.ok) {
                    throw new Error("Service not found");
                }
                const data = await res.json();
                setSelectedSolution(data);
            } catch (error) {
                console.error("Failed to fetch selected solution:", error);
            } finally {
                setLoading(false);
            }
        };

        if (serviceSlug) {
            fetchSolutionBySlug();
        }
    }, [serviceSlug]);

    if (loading || !selectedSolution) return <div className="text-center py-10">Loading...</div>;

    const { title, image, description } = selectedSolution;

    return (
        <div>
            <CommonHero title={title} />

            <div className="py-4 md:px-4 lg:px-24">
                <div className="container mx-auto px-4">
                    <div className="flex flex-col lg:flex-row gap-8">
                        {/* Sidebar - Our Solutions */}
                        <div className="w-full lg:w-1/3">
                            <motion.div
                                initial={{ opacity: 0, y: 20 }}
                                animate={{ opacity: 1, y: 0 }}
                                transition={{ duration: 0.5 }}
                                className="sticky top-0 bg-[#f8f8f8] p-6 rounded-lg shadow-md"
                            >
                                <h3 className="text-2xl font-bold text-indigo-950 mb-6 pb-2">
                                    Our Solutions
                                </h3>
                                <ul className="space-y-3">
                                    {solutions.map((service, index) => (
                                        <Link
                                            to={`/Service/${service.slug}`}
                                            key={index}
                                            className={`relative block py-3 px-3 mb-5 rounded-2xl overflow-hidden group ${
                                                service.slug === serviceSlug
                                                    ? "bg-indigo-950 text-white"
                                                    : "bg-white text-indigo-950"
                                            }`}
                                        >
                                            <span className="relative z-10 group-hover:text-white transition-colors duration-500 flex justify-between items-center">
                                                <span>{service.title}</span>
                                                <div className="rounded-full bg-indigo-950 p-2 text-xs text-white">
                                                    <FaArrowRight />
                                                </div>
                                            </span>
                                            <span className="absolute inset-0 bg-indigo-950 -translate-y-full group-hover:translate-y-0 transition-transform duration-700 ease-in-out z-0"></span>
                                        </Link>
                                    ))}
                                </ul>
                            </motion.div>
                        </div>

                        {/* Main Content */}
                        <div className="w-full lg:w-2/3">
                            <motion.div
                                initial={{ opacity: 0 }}
                                animate={{ opacity: 1 }}
                                transition={{ duration: 0.5, delay: 0.2 }}
                            >
                                {/* Featured Image */}
                                <div className="relative overflow-hidden group rounded-3xl">
                                    <motion.img
                                        src={image}
                                        alt={title}
                                        className="w-full h-auto object-cover mb-4 rounded-3xl"
                                        initial={{ scale: 1 }}
                                        whileHover={{ scale: 1.1 }}
                                        transition={{ duration: 0.7 }}
                                    />
                                    <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                                </div>

                                {/* Service Content */}
                                <div className="p-6 md:p-8">
                                    <div
                                        className="prose max-w-none text-gray-700"
                                        dangerouslySetInnerHTML={{ __html: description }}
                                    />
                                </div>
                            </motion.div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default SingleSolution;
