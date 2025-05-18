// GallerySection.js
import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import project1 from "../../assets/rs-tech-asset/project-1.jpg";
import project2 from "../../assets/rs-tech-asset/project-2.jpg";
import project3 from "../../assets/rs-tech-asset/project-3.jpg";
import project4 from "../../assets/rs-tech-asset/project-4.jpg";
import project5 from "../../assets/rs-tech-asset/project-5.jpg";
import project6 from "../../assets/rs-tech-asset/project-6.jpg";

const Album = () => {
    const albums = [
        {
            id: 1,
            coverImage: project1,
            title: "Service",
        },
        {
            id: 2,
            coverImage: project2,
            title: "Fascility",
        },
        {
            id: 3,
            coverImage: project3,
            title: "Team",
        },
        {
            id: 4,
            coverImage: project4,
            title: "Monitoring",
        },
        {
            id: 5,
            coverImage: project5,
            title: "Training Sessions",
        },
        {
            id: 6,
            coverImage: project6,
            title: "Extra ",

        }
    ];

    const fadeInUp = {
        hidden: { opacity: 0, y: 20 },
        visible: { opacity: 1, y: 0 }
    };

    return (
        <div>
            <section className="py-4 md:px-24 lg:px-24 bg-white">
                <div className="container mx-auto px-4">
                    {/* Gallery Grid */}
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {albums.map((album, index) => (
                            <motion.div
                                key={album.id}
                                initial="hidden"
                                whileInView="visible"
                                viewport={{ once: true }}
                                variants={fadeInUp}
                                transition={{ duration: 0.6, delay: index * 0.1 }}
                                className="group"
                            >
                                <Link to={`/photo/${album.id}`} className="block">
                                    <div className="relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 h-full">

                                        {/* Image Container */}
                                        <motion.div
                                            whileHover={{ scale: 1.05 }}
                                            transition={{ duration: 0.4 }}
                                            className="relative overflow-hidden h-64"
                                        >
                                            <img
                                                src={album.coverImage}
                                                alt={album.title || "Event Gallery"}
                                              
                                                className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                            />
                                            <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay" />
                                        </motion.div>

                                        {/* Album Title */}
                                        <div className="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent group-hover:translate-y-[-5px] transition-all duration-300">
                                            <h3 className="text-white font-medium text-lg">
                                                <span className="hover:text-indigo-300 transition-colors duration-300">
                                                    {album.title}
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                </Link>
                            </motion.div>
                        ))}
                    </div>
                </div>
            </section>
        </div>
    );
};

export default Album;
