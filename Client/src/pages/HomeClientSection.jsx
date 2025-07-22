import { motion } from "framer-motion";
import { Link } from "react-router-dom";

const HomeClientSection = ({ title = "", brands = [] }) => {
  const fadeInUp = {
    hidden: { opacity: 0, y: 20 },
    visible: { opacity: 1, y: 0 },
  };

  const displayedBrands = brands.slice(0, 18); 

  if (!brands.length) {
    return (
      <div className="flex justify-center items-center h-40">
        <span className="text-lg font-semibold">No brands found.</span>
      </div>
    );
  }

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
          {displayedBrands.map((brand, index) => (
            <motion.div
              key={brand.id}
              initial="hidden"
              whileInView="visible"
              viewport={{ once: true }}
              variants={fadeInUp}
              transition={{ duration: 0.6, delay: index * 0.05 }}
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

        {/* See All Button */}
        <div className="mt-10 text-center">
          <Link
            to="/clients"
            className="inline-block bg-indigo-900 text-white text-sm font-semibold px-6 py-3 rounded-full shadow-md hover:bg-indigo-800 transition duration-300"
          >
            See All Clients
          </Link>
        </div>
      </div>
    </section>
  );
};

export default HomeClientSection;
