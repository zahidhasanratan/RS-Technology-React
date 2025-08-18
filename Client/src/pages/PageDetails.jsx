import React from 'react';
import { motion } from 'framer-motion';
import { useLoaderData } from 'react-router-dom';
import CommonHero from '../Shared/CommonHero';

export const PageDetails = () => {
  const page = useLoaderData();

  const fadeInUp = {
    hidden: { opacity: 0, y: 40 },
    visible: { opacity: 1, y: 0 },
  };

  // Construct image URL only if image is not null
  const imageUrl = page.image
    ? `https://server.rst-bd.com/uploads/page/${page.image}`
    : null;

  return (
    <div>
      <CommonHero title={page.title} />

      {/* Page Content Section */}
      <section className="py-10 md:py-12 bg-white">
        <div className="container mx-auto px-4">
          <div className="flex flex-col lg:flex-row items-center gap-12">
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

                {/* Conditionally Render Image */}
                {imageUrl && (
                  <motion.img
                    src={imageUrl}
                    alt={page.title}
                    initial={{ opacity: 0, y: 20 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    viewport={{ once: true }}
                    transition={{ duration: 0.8, delay: 0.25 }}
                    className="w-full mx-auto max-h-[300px] object-cover rounded-lg shadow"

                  />
                )}

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
    </div>
  );
};
