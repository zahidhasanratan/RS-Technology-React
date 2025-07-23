import React, { useEffect, useState } from 'react';
import { motion } from 'framer-motion';
import { useParams, Link } from 'react-router-dom';
import CommonHero from '../Shared/CommonHero';

const fadeInUp = {
  hidden: { opacity: 0, y: 40 },
  visible: { opacity: 1, y: 0 },
};

const PCategory = () => {
  const { id } = useParams();
  const [subCategories, setSubCategories] = useState([]);
  const [categoryTitle, setCategoryTitle] = useState('');

  useEffect(() => {
    const fetchSubCategories = async () => {
      try {
        const res = await fetch(`http://127.0.0.1:8000/api/scategory/${id}`);
        const data = await res.json();
        setSubCategories(data);
      } catch (error) {
        console.error('Failed to load subcategories:', error);
      }
    };

    const fetchPageTitle = async () => {
      try {
        const res = await fetch(`http://127.0.0.1:8000/api/pcategory/${id}`);
        const data = await res.json();
        setCategoryTitle(data.name || 'Category');
      } catch (error) {
        console.error('Failed to fetch category title:', error);
      }
    };

    fetchSubCategories();
    fetchPageTitle();
  }, [id]);

  return (
    <div>
      <CommonHero title={categoryTitle} />

      <section className="py-8 md:px-24 lg:px-24 bg-[#F6F6F6]">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {subCategories.map((item, index) => (
              <motion.div
                key={item.id}
                initial="hidden"
                whileInView="visible"
                viewport={{ once: true }}
                transition={{ duration: 0.6, delay: index * 0.2 }}
                variants={fadeInUp}
                className="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
              >
                <Link
                  to={`/scategory/${item.id}`}
                  className="block relative group w-full h-[220px] overflow-hidden"
                >
                  <img
                    alt={item.title}
                    className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    src={item.image}
                  />
                  <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                </Link>
                <div className="p-6">
                  <h3 className="text-xl text-center font-semibold mb-3 text-gray-800 dark:text-white">
                    {item.title}
                  </h3>
                  <div>
                    <Link
                      to={`/scategory/${item.id}`}
                      className="inline-flex text-center items-center text-indigo-600 dark:text-indigo-400 font-medium hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors"
                    >
                      View More
                      <svg
                        className="w-4 h-4 ml-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth="2"
                          d="M14 5l7 7m0 0l-7 7m7-7H3"
                        />
                      </svg>
                    </Link>
                  </div>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
};

export default PCategory;
