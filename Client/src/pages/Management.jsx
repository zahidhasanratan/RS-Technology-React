import { useLoaderData } from 'react-router-dom';
import { motion } from 'framer-motion';
import CommonHero from '../Shared/CommonHero';

const Management = () => {
  const teamMembers = useLoaderData();

  const fadeInUp = {
    hidden: { opacity: 0, y: 40 },
    visible: { opacity: 1, y: 0 }
  };

  return (
    <div>
      <CommonHero title="Management" />
      <section className="py-16 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="relative max-w-7xl mx-auto">
            {teamMembers.map((member, index) => {
              const imageLeft = index % 2 === 0;

              return (
                <motion.div
                  key={member.id}
                  initial="hidden"
                  whileInView="visible"
                  viewport={{ once: true }}
                  variants={fadeInUp}
                  transition={{ duration: 0.6, delay: index * 0.2 }}
                  className="relative mb-12 last:mb-0"
                >
                  <div className={`group flex flex-col ${imageLeft ? 'md:flex-row' : 'md:flex-row-reverse'} items-center gap-6 md:gap-8 transition-all duration-300 bg-white rounded-xl p-4 hover:shadow-xl hover:-translate-y-1`}>
                    <div className="w-full md:w-1/5 flex justify-center">
                      <div className="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-indigo-900 shadow-lg transition-transform duration-500 group-hover:scale-105">
                        <img
                          src={member.image}
                          alt={member.Name}
                          className="w-full h-full object-cover"
                        />
                      </div>
                    </div>

                    <div className="w-full md:w-4/5">
                      <h3 className="text-xl font-bold text-indigo-900">{member.Name}</h3>
                      <p className="text-indigo-600 font-medium mb-4">{member.email}</p>
                      <p className="text-gray-600">{member.Address}</p>
                    </div>
                  </div>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>
    </div>
  );
};

export default Management;
