import { motion, AnimatePresence } from 'framer-motion';
import { useLoaderData } from 'react-router-dom';
import { useState, useEffect } from 'react';
import CommonHero from '../CommonHero';

const SingleAlbum = () => {
  const data = useLoaderData(); // this contains API data
  const [selectedImage, setSelectedImage] = useState(null);
  const [currentIndex, setCurrentIndex] = useState(0);

  useEffect(() => {
    document.body.style.overflow = selectedImage ? 'hidden' : '';
    return () => { document.body.style.overflow = ''; };
  }, [selectedImage]);

  const images = data.images2 || [];

  const handleNext = () => {
    setCurrentIndex((prev) => (prev + 1) % images.length);
  };

  const handlePrev = () => {
    setCurrentIndex((prev) => (prev - 1 + images.length) % images.length);
  };

  return (
    <div>
      <CommonHero title={data.name || 'Photo Gallery'} />
      <section className="py-4 md:px-24 lg:px-24 bg-white">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {images.map((image, idx) => (
              <div
                key={idx}
                className="relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 group"
              >
                <div
                  className="relative overflow-hidden h-64 cursor-pointer"
                  onClick={() => {
                    setSelectedImage(image);
                    setCurrentIndex(idx);
                  }}
                >
                  <img
                    src={image}
                    alt={`Gallery ${idx + 1}`}
                    className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                  />
                  <div className="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition-opacity duration-300"></div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Modal */}
      <AnimatePresence>
        {selectedImage && (
          <motion.div
            className="fixed inset-0 z-[9999] bg-black/80 backdrop-blur-xs flex items-center justify-center"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
          >
            <button
              onClick={() => setSelectedImage(null)}
              className="fixed top-5 right-5 text-white text-5xl transition z-[10000]"
            >
              &times;
            </button>
            <button
              onClick={(e) => { e.stopPropagation(); handlePrev(); }}
              className="absolute left-5 top-1/2 -translate-y-1/2 text-white text-6xl lg:text-7xl transition"
            >
              &#8249;
            </button>
            <button
              onClick={(e) => { e.stopPropagation(); handleNext(); }}
              className="absolute right-5 top-1/2 -translate-y-1/2 text-white text-6xl lg:text-7xl transition"
            >
              &#8250;
            </button>

            <motion.div
              initial={{ scale: 0.9 }}
              animate={{ scale: 1 }}
              exit={{ scale: 0.9 }}
              transition={{ duration: 0.3 }}
              onClick={(e) => e.stopPropagation()}
              className="max-w-5xl w-full px-4"
            >
              <img
                src={images[currentIndex]}
                alt="Zoomed View"
                className="w-full h-auto rounded-lg shadow-2xl"
              />
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
};

export default SingleAlbum;
