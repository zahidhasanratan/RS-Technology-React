import React, { useEffect, useState } from "react";
import { motion } from "framer-motion";
import CommonHero from "../Shared/CommonHero";

const AllBrandsPage = () => {
  const [brands, setBrands] = useState([]);
  const [loading, setLoading] = useState(true);

  const fadeInUp = {
    hidden: { opacity: 0, y: 20 },
    visible: { opacity: 1, y: 0 },
  };

  // ✅ Scroll to top on page load
  useEffect(() => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }, []);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/clientsphoto")
      .then((res) => res.json())
      .then((data) => {
        setBrands(data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Failed to fetch brands:", error);
        setLoading(false);
      });
  }, []);

  return (
    <div>
      <CommonHero title="Our Clients" />

      <section className="py-16 bg-white">
        <div className="container mx-auto px-4">
          {loading ? (
            <div className="flex justify-center items-center h-60">
              <span className="text-lg font-semibold">Loading brands...</span>
            </div>
          ) : !brands.length ? (
            <div className="flex justify-center items-center h-60">
              <span className="text-lg font-semibold">No brands found.</span>
            </div>
          ) : (
            <>
              <motion.div
                initial="hidden"
                whileInView="visible"
                viewport={{ once: true }}
                variants={fadeInUp}
                transition={{ duration: 0.6 }}
                className="text-center mb-8"
              >
                <h2 className="text-3xl md:text-4xl font-bold">
                  <span className="text-indigo-900">All Our Clients</span>
                </h2>
              </motion.div>

              <div className="lg:px-20 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                {brands.map((brand, index) => (
                  <motion.div
                    key={brand.id}
                    initial="hidden"
                    whileInView="visible"
                    viewport={{ once: true }}
                    variants={fadeInUp}
                    transition={{ duration: 0.6, delay: index * 0.02 }}
                    className="flex justify-center"
                  >
                    <div className="w-full rounded-lg shadow-lg transition-all duration-300">
                      <motion.div
                        whileHover={{ scale: 1.1 }}
                        transition={{ duration: 0.3 }}
                        className="flex justify-center items-center"
                      >
                        <a
                          href={brand.designation}
                          target="_blank"
                          rel="noopener noreferrer"
                        >
                          <img
                            src={brand.image}
                            alt={brand.title}
                            className="h-20 max-w-[120px] object-contain transition-all duration-300"
                          />
                        </a>
                      </motion.div>
                    </div>
                  </motion.div>
                ))}
              </div>
            </>
          )}
        </div>
      </section>
    </div>
  );
};

export default AllBrandsPage;
