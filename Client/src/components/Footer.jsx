import React, { useEffect, useState } from "react";
import {
    FaPinterestP,
    FaFacebookF,
    FaInstagram,
    FaPhoneAlt,
    FaMapMarkerAlt,
    FaEnvelope,
    FaTwitter
} from "react-icons/fa";
import { Link } from "react-router-dom";

const Footer = () => {
    const [aboutData, setAboutData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/footerother")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                if (Array.isArray(data) && data.length > 0) {
                    setAboutData(data[0]);
                } else {
                    setAboutData(null);
                }
                setLoading(false);
            })
            .catch((err) => {
                console.error("Fetch error:", err);
                setError(err.message);
                setLoading(false);
            });
    }, []);

    return (
        <footer className="bg-indigo-950 text-white pt-10 text-md md:px-24 lg:px-24">
            <div className="container mx-auto px-4">
                <div className="flex flex-col md:flex-row flex-wrap gap-8 lg:gap-12">
                    <div className="w-full md:w-[calc(50%-16px)] lg:w-[40%] space-y-4">
                        <h3 className="text-xl font-semibold">About Us</h3>
                        {loading && <p>Loading...</p>}
                        {error && <p className="text-red-400">Error: {error}</p>}
                        {!loading && aboutData && (
                            <p className="leading-relaxed">{aboutData.description}</p>
                        )}
                        <div className="flex space-x-4 text-xl">
                            <a href="#">
                                <FaPinterestP className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                            </a>
                            <a href="#">
                                <FaTwitter className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                            </a>
                            <a href="#">
                                <FaFacebookF className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                            </a>
                            <a href="#">
                                <FaInstagram className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                            </a>
                        </div>
                    </div>

                    <div className="w-full md:w-[calc(50%-16px)] lg:w-[20%] space-y-6">
                        <h3 className="text-xl font-semibold text-white mb-4">Quick Links</h3>
                        <ul className="space-y-3">
                            {[
                                { name: "Service & Support" },
                                { name: "FAQs" },
                                { name: "Manufacturers" },
                                { name: "CSR" },
                                { name: "Career", path: "/career" },
                                { name: "Location Map" }
                            ].map((link, idx) => (
                                <li key={idx}>
                                    <Link
                                        to={link.path || "#"}
                                        className="text-gray-300 hover:text-indigo-300 transition-colors duration-200 flex items-center"
                                    >
                                        {link.name}
                                    </Link>
                                </li>
                            ))}
                        </ul>
                    </div>

                    <div className="w-full md:w-full lg:w-[30%] space-y-4">
                        <h3 className="text-xl font-semibold">Contact</h3>
                        <div className="space-y-4">
                            <div className="flex items-start gap-3 group">
                                <div className="border bg-[#FFFFFF1A] text-2xl p-3 rounded-full flex items-center justify-center hover:bg-indigo-950 hover:border-white transition-colors">
                                    <FaMapMarkerAlt />
                                </div>
                                <p>House# 9, Road# 2C, Block# J, Baridhara, Dhaka-1212</p>
                            </div>
                            <div className="flex items-start gap-3 group">
                                <div className="border bg-[#FFFFFF1A] text-2xl p-3 rounded-full flex items-center justify-center hover:bg-indigo-950 hover:border-white transition-colors">
                                    <FaPhoneAlt />
                                </div>
                                <a href="tel:01916017508" className="hover:text-indigo-300">(+088) 01916017508</a>
                            </div>
                            <div className="flex items-start gap-3 group">
                                <div className="border bg-[#FFFFFF1A] text-2xl p-3 rounded-full flex items-center justify-center hover:bg-indigo-950 hover:border-white transition-colors">
                                    <FaEnvelope />
                                </div>
                                <a href="mailto:rejveee@gmail.com" className="hover:text-indigo-300 lowercase">rejveee@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="border-t border-indigo-800 mt-10 py-6">
                <div className="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-indigo-100">
                    <p>Copyright © 2025 RS Technologies Ltd. All Rights Reserved.</p>
                    <p className="mt-2 md:mt-0">
                        <a href="#" target="_blank" rel="noopener noreferrer" className="hover:text-indigo-300">
                            Web Design Company: <span className="font-cursive">e-<span className="text-red-400">S</span>oft</span>
                        </a>
                    </p>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
