import { motion } from 'framer-motion';
import partner1 from "../assets/rs-tech-asset/partner-1.png";
import partner2 from "../assets/rs-tech-asset/partner-2.png";
import partner3 from "../assets/rs-tech-asset/partner-3.png";
import partner4 from "../assets/rs-tech-asset/partner-4.png";
import partner5 from "../assets/rs-tech-asset/partner-5.png";
import partner6 from "../assets/rs-tech-asset/partner-6.png";
import partner7 from "../assets/rs-tech-asset/partner-7.png";
import partner8 from "../assets/rs-tech-asset/partner-8.png";
import partner9 from "../assets/rs-tech-asset/partner-9.png";
import partner10 from "../assets/rs-tech-asset/partner-10.png";
import partner11 from "../assets/rs-tech-asset/partner-11.png";
import partner12 from "../assets/rs-tech-asset/partner-12.png";

const BrandsSection = ({ title = "" }) => {
    const brands = [
        { id: 1, logo: partner1, alt: "Brand 1" },
        { id: 2, logo: partner2, alt: "Brand 2" },
        { id: 3, logo: partner3, alt: "Brand 3" },
        { id: 4, logo: partner4, alt: "Brand 4" },
        { id: 5, logo: partner5, alt: "Brand 5" },
        { id: 6, logo: partner6, alt: "Brand 6" },
        { id: 7, logo: partner7, alt: "Brand 7" },
        { id: 8, logo: partner8, alt: "Brand 8" },
        { id: 9, logo: partner9, alt: "Brand 9" },
        { id: 10, logo: partner10, alt: "Brand 10" },
        { id: 11, logo: partner11, alt: "Brand 11" },
        { id: 12, logo: partner12, alt: "Brand 12" },
    ];

    const fadeInUp = {
        hidden: { opacity: 0, y: 20 },
        visible: { opacity: 1, y: 0 }
    };

    return (
        <section className="py-16 bg-white">
            <div className="container mx-auto px-4">
                {/* Section Title */}
                <motion.div
                    initial="hidden"
                    whileInView="visible"
                    viewport={{ once: true }}
                    variants={fadeInUp}
                    transition={{ duration: 0.6 }}
                    className="text-center mb-8"
                >
                    <h2 className="text-3xl md:text-4xl font-bold">
                        <span className="text-indigo-900">{title}</span>
                    </h2>
                </motion.div>

                {/* Brands Grid */}
                <div className="lg:px-20 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    {brands.map((brand, index) => (
                        <motion.div
                            key={brand.id}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            variants={fadeInUp}
                            transition={{ duration: 0.6, delay: index * 0.1 }}
                            className="flex justify-center"
                        >
                            <div className=" w-full rounded-lg shadow-lg  transition-all duration-300">
                                <motion.div
                                    whileHover={{ scale: 1.1 }}
                                    transition={{ duration: 0.3 }}
                                    className="flex justify-center items-center"
                                >
                                    <img
                                        src={brand.logo}
                                        alt={brand.alt}
                                        className="h-25 max-w-20 object-contain transition-all duration-300"
                                    />
                                </motion.div>
                            </div>
                        </motion.div>
                    ))}
                </div>
            </div>
        </section>
    );
};

export default BrandsSection;