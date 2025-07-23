import React, { useEffect, useState } from 'react';
import { useParams, Link, useLoaderData } from 'react-router-dom';
import CommonHero from '../Shared/CommonHero';

const SCategory = () => {
  const { id } = useParams(); // From /scategory/:id
  const subcategories = useLoaderData(); // All subcategories from loader
  const [items, setItems] = useState([]);

  // Find subcategory name for display
  const matchedSubcategory = subcategories.find(
    (cat) => String(cat.id) === String(id)
  );
  const subcategoryTitle = matchedSubcategory?.title || 'Subcategory';

  useEffect(() => {
    const fetchItems = async () => {
      try {
        const res = await fetch(`https://server.rst-bd.com/api/item`);
        const data = await res.json();

        // Filter by category_id from URL
        const filteredItems = data.filter(
          (item) => Number(item.category_id) === Number(id)
        );

        setItems(filteredItems);
      } catch (error) {
        console.error('Error fetching item data:', error);
      }
    };

    fetchItems();
  }, [id]);

  return (
    <div>
      <CommonHero title={subcategoryTitle} />

      <section className="py-8 md:px-24 lg:px-24 bg-[#F6F6F6]">
        <div className="container mx-auto px-4">
          {items.length === 0 ? (
            <p className="text-center text-gray-500">No items found for this category.</p>
          ) : (
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              {items.map((item) => (
                <div
                  key={item.id}
                  className="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                >
                  <Link
                    to={`/product/${item.slug || item.id}`}
                    className="block relative group w-full h-[220px] overflow-hidden"
                  >
                    <img
                      src={item.image}
                      alt={item.name}
                      className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    />
                    <div className="absolute inset-0 pointer-events-none before:content-[''] before:absolute before:inset-0 before:bg-black before:rounded-full before:opacity-0 before:transition-all before:duration-700 group-hover:before:opacity-50 group-hover:before:scale-200 before:scale-0 before:origin-center mix-blend-overlay"></div>
                  </Link>
                  <div className="p-6">
                    <h3 className="text-xl text-center font-semibold mb-3 text-gray-800 dark:text-white">
                      {item.name}
                    </h3>
                    <p
                      className="text-gray-600 dark:text-gray-300 mb-3 text-sm"
                      dangerouslySetInnerHTML={{
                        __html: item.sub_title || item.description || '—',
                      }}
                    ></p>
                    <div>
                      <Link
                        className="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-medium hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors"
                        to={`/product/${item.slug || item.id}`}
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
                </div>
              ))}
            </div>
          )}
        </div>
      </section>
    </div>
  );
};

export default SCategory;
