import React from 'react';
import { motion } from 'framer-motion';
import { useLoaderData } from 'react-router-dom';

export const PageDetails = () => {
  const page = useLoaderData();

  return (
    <section className="py-40 md:py-42 bg-white">
      <div className="container mx-auto px-4">
        <div className="flex flex-col lg:flex-row items-center gap-12">
          {/* Content Section */}
          <motion.div
            initial={{ opacity: 0, y: 40 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.8 }}
            className="w-full"
          >
            <div className="space-y-6">
              <motion.h2
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.8, delay: 0.2 }}
                className="text-3xl md:text-4xl font-bold text-gray-900"
              >
                <span className="text-indigo-900">{page.title}</span>
              </motion.h2>

              <motion.div
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.8, delay: 0.3 }}
                className="text-gray-600 leading-relaxed"
                dangerouslySetInnerHTML={{ __html: page.description }}
              />
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
};
