import React from 'react';
import post1 from "../../assets/rs-tech-asset/post-1.jpg";
import post2 from "../../assets/rs-tech-asset/post-2.jpg";
import post3 from "../../assets/rs-tech-asset/post-3.jpg";
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';

const blogPosts = [
    {
        id: 1,
        title: "News Title 1",
        date: "20 Jan",
        image: post1,
        link: "news-single.html"
    },
    {
        id: 2,
        title: "News Title 2",
        date: "21 Jan",
        image: post2,
        link: "news-single.html"
    },
    {
        id: 3,
        title: "News Title 3",
        date: "22 Jan",
        image: post3,
        link: "news-single.html"
    }
];

// Animation variants
const container = {
    hidden: { opacity: 0 },
    show: {
        opacity: 1,
        transition: {
            staggerChildren: 0.2
        }
    }
};

const item = {
    hidden: { opacity: 0, y: 20 },
    show: {
        opacity: 1,
        y: 0,
        transition: {
            duration: 0.5,
            ease: "easeOut"
        }
    }
};

const hoverEffect = {
    scale: 1.03,
    transition: { duration: 0.3 }
};

const imageHover = {
    scale: 1.1,
    transition: { duration: 0.5 }
};

const NewsSection = () => {
    return (
        <div className="py-4 md:px-24 lg:px-24 bg-white">
            <div className="container mx-auto px-4">
                <motion.div
                    className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
                    variants={container}
                    initial="hidden"
                    whileInView="show"
                    viewport={{ once: true, margin: "-100px" }}
                >
                    {blogPosts.map((post) => (
                        <motion.div
                            key={post.id}
                            className="bg-white shadow-md hover:shadow-lg rounded-xl overflow-hidden"
                            variants={item}
                            whileHover={hoverEffect}
                        >
                            <Link to={`/news/${post.id}`}>
                                <motion.div
                                    className="relative group w-full h-56 overflow-hidden rounded-xl"
                                    whileHover="hover"
                                >
                                    <motion.img
                                        src={post.image}
                                        alt={post.title}
                                        
                                        className="w-full h-full object-cover"
                                        variants={imageHover}
                                    />
                                    <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>

                                    {/* Date in Bottom Corner */}
                                    <motion.div
                                        className="absolute bottom-4 right-4 bg-indigo-950 text-white text-xl font-semibold px-4 py-4 rounded-full"
                                        initial={{ scale: 0.8 }}
                                        whileInView={{ scale: 1 }}
                                        transition={{ delay: 0.3 }}
                                        viewport={{ once: true }}
                                    >
                                        {post.date}
                                    </motion.div>
                                </motion.div>
                            </Link>
                            <div className="p-4">
                                <h2 className="text-xl font-semibold text-indigo-950 mb-4">
                                    <Link to={`/news/${post.id}`} className="hover:text-indigo-700 transition-colors">
                                        {post.title}
                                    </Link>
                                </h2>

                                <motion.div whileHover={{ x: 5 }}>
                                    <Link
                                        to={`/news/${post.id}`}
                                        className="inline-block text-indigo-950 hover:text-indigo-700 font-medium transition-colors"
                                    >
                                        Read more →
                                    </Link>
                                </motion.div>
                            </div>
                        </motion.div>
                    ))}
                </motion.div>
            </div>
        </div>
    );
};

export default NewsSection;