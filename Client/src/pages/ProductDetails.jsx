import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import CommonHero from '../Shared/CommonHero';
import axios from 'axios';

export const ProductDetails = () => {
  const { slug } = useParams();
  const [activeTab, setActiveTab] = useState('tab1');
  const [product, setProduct] = useState(null);

  useEffect(() => {
    axios
      .get(`http://127.0.0.1:8000/api/item/${slug}`)
      .then((res) => {
        setProduct(res.data[0]);
      })
      .catch((err) => {
        console.error('Error fetching product:', err);
      });
  }, [slug]);

  if (!product) {
    return (
      <div className="container mx-auto py-10 text-center text-gray-600">
        Loading product...
      </div>
    );
  }

  return (
    <div className="bg-[#F8F8F8]">
      {/* ✅ Common Header */}
      <CommonHero title={product.name || 'Product Details'} />

      {/* ✅ Product Info Section */}
      <section className="container mx-auto px-4 py-6">
        <div className="flex flex-col md:flex-row bg-white rounded-lg shadow p-6">
          {/* Image */}
          <div className="md:w-1/2 w-full mb-6 md:mb-0">
            <div className="overflow-hidden rounded-lg">
              <img
                src={product.image}
                alt={product.name}
                className="w-full object-contain h-[400px] bg-white"
              />
            </div>
          </div>

          {/* Details */}
          <div className="md:w-1/2 w-full md:pl-10">
            <div className="bg-white p-6">
              <h3 className="text-xl font-semibold mb-2">{product.name}</h3>
              {/* <p className="text-gray-700 mb-4">{product.sub_title}</p> */}
              <div
                className="text-sm text-gray-600 space-y-2"
                dangerouslySetInnerHTML={{ __html: product.description }}
              />
            </div>
          </div>
        </div>
      </section>

      {/* ✅ Tabs Section */}
      <section className="container mx-auto px-4 py-10">
        <div className="bg-white rounded-lg shadow p-6">
          {/* Tabs Header */}
          <div className="flex flex-wrap gap-8 border-b pb-2 mb-4">
            {[
              { key: 'tab1', title: product.title1 },
              { key: 'tab2', title: product.title2 },
              { key: 'tab3', title: product.title3 },
              { key: 'tab4', title: product.title4 },
            ]
              .filter((tab) => tab.title) // show only if title exists
              .map((tab) => (
                <button
                  key={tab.key}
                  onClick={() => setActiveTab(tab.key)}
                  className={`tab-btn font-medium ${
                    activeTab === tab.key ? 'text-indigo-600' : 'text-gray-700'
                  } hover:text-indigo-600 capitalize`}
                >
                  {tab.title}
                </button>
              ))}
          </div>

          {/* Tab Content */}
          {activeTab === 'tab1' && (
            <div>
              <h3 className="text-xl font-semibold mb-2">{product.title1}</h3>
              <div
                className="text-gray-700"
                dangerouslySetInnerHTML={{ __html: product.details1 }}
              />
            </div>
          )}
          {activeTab === 'tab2' && (
            <div>
              <h3 className="text-xl font-semibold mb-2">{product.title2}</h3>
              <div
                className="text-gray-700"
                dangerouslySetInnerHTML={{ __html: product.details2 }}
              />
            </div>
          )}
          {activeTab === 'tab3' && (
            <div>
              <h3 className="text-xl font-semibold mb-2">{product.title3}</h3>
              <div
                className="text-gray-700"
                dangerouslySetInnerHTML={{ __html: product.details3 }}
              />
            </div>
          )}
          {activeTab === 'tab4' && (
            <div>
              <h3 className="text-xl font-semibold mb-2">{product.title4}</h3>
              <div
                className="text-gray-700"
                dangerouslySetInnerHTML={{ __html: product.details4 }}
              />
            </div>
          )}
        </div>
      </section>
    </div>
  );
};
