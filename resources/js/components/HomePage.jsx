import React from 'react';

const HomePage = () => {
  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-100">
      {/* Section vidéo (rectangle centré) */}
      <div className="flex justify-center items-center py-12 px-4">
        <div className="w-full max-w-5xl rounded-2xl overflow-hidden shadow-2xl">
          <video
            autoPlay
            loop
            muted
            playsInline
            className="w-full h-auto"
          >
            <source src="/videos/dental-bg.mp4" type="video/mp4" />
            <img src="/images/dental-fallback.jpg" alt="Chevalley Dental Clinic" />
          </video>
        </div>
      </div>

      {/* Titre + description */}
      <div className="text-center py-10 px-4">
        <h1 className="text-4xl md:text-5xl font-bold text-gray-800">
          Chevalley Dental Clinic – Dr Abdou K
        </h1>
        <p className="text-xl text-gray-600 mt-4">Orthodontie & Esthétique</p>
        <p className="text-md text-gray-500 mt-2">Soins dentaires de qualité à Dely Ibrahim</p>
      </div>

      {/* Coordonnées + Carte */}
      <div className="max-w-7xl mx-auto px-4 py-12">
        <div className="grid md:grid-cols-2 gap-12">
          {/* Colonne gauche : infos */}
          <div className="space-y-6">
            <div className="flex items-start gap-4">
              <span className="text-2xl">📍</span>
              <div>
                <h3 className="font-semibold text-gray-800">Adresse</h3>
                <p className="text-gray-600">24 lot, Dely Ibrahim 16040, Algérie<br />(Q285+X6F)</p>
              </div>
            </div>
            <div className="flex items-start gap-4">
              <span className="text-2xl">📞</span>
              <div>
                <h3 className="font-semibold text-gray-800">Téléphone</h3>
                <a href="tel:0792657809" className="text-blue-600 hover:underline">0792 65 78 09</a>
              </div>
            </div>
            <div className="flex items-start gap-4">
              <span className="text-2xl">⏰</span>
              <div>
                <h3 className="font-semibold text-gray-800">Horaires</h3>
                <ul className="text-gray-600">
                  <li>Lundi – Samedi : 08:30 – 19:00</li>
                  <li>Dimanche : 08:30 – 12:00 (sur RDV)</li>
                  <li className="text-sm text-amber-600 mt-1">⚠️ Fermé · Ouvre à 08:30 dimanche</li>
                </ul>
              </div>
            </div>
            <div className="flex items-start gap-4">
              <span className="text-2xl">📷</span>
              <div>
                <h3 className="font-semibold text-gray-800">Instagram</h3>
                <a
                  href="https://www.instagram.com/p/CU0oY7_jgAj/"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center gap-2 text-pink-600 hover:underline"
                >
                  <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.248 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.31 3.608-.975.975-2.242 1.248-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.31-.975-.975-1.248-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.334-2.633 1.31-3.608.975-.975 2.242-1.248 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zM12 0C8.741 0 8.332.014 7.052.072c-1.95.089-3.663.567-5.038 1.942C1.572 3.433 1.097 5.11 1.008 7.06.95 8.34.936 8.749.936 12c0 3.251.014 3.66.072 4.94.089 1.95.567 3.663 1.942 5.038 1.375 1.375 3.088 1.853 5.038 1.942 1.28.058 1.689.072 4.94.072 3.251 0 3.66-.014 4.94-.072 1.95-.089 3.663-.567 5.038-1.942 1.375-1.375 1.853-3.088 1.942-5.038.058-1.28.072-1.689.072-4.94 0-3.251-.014-3.66-.072-4.94-.089-1.95-.567-3.663-1.942-5.038C19.567 1.572 17.844 1.097 15.894 1.008 14.614.95 14.205.936 10.944.936z"/>
                    <path d="M12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8z"/>
                    <circle cx="18.406" cy="5.594" r="1.44"/>
                  </svg>
                  @chevalleydentalclinic
                </a>
              </div>
            </div>
          </div>

          {/* Colonne droite : Google Maps */}
          <div className="h-80 md:h-96 rounded-xl overflow-hidden shadow-lg">
            <iframe
              title="Chevalley Dental Clinic - Google Maps"
              className="w-full h-full"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.537743163799!2d3.003426!3d36.763499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e4b8e5f7c0b8d%3A0xfcbbbbbbbbbbbbb!2s24%20lot%2C%20Dely%20Ibrahim%2016040!5e0!3m2!1sfr!2sdz!4v1710000000000!5m2!1sfr!2sdz"
              allowFullScreen=""
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-gray-800 text-white text-center py-6 mt-12">
        <p>© {new Date().getFullYear()} Chevalley Dental Clinic – Dr Abdou K | Tous droits réservés</p>
      </footer>
    </div>
  );
};

export default HomePage;