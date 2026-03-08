<p align="center">
  <img src="public/img/logo.png" width="160" alt="Bismillah Islamic Academy Logo">
</p>

<h1 align="center">Bismillah Islamic Academy</h1>

<p align="center">
  <em>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</em><br>
  In the Name of Allah, the Most Gracious, the Most Merciful
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Laravel Version"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 📖 About Bismillah Islamic Academy

**Bismillah Islamic Academy** is a dedicated Islamic educational institution with over **10 years of excellence** in providing authentic Quranic and Islamic education. This web application is built with **Laravel** to manage courses, enrollments, teachers, and student information.

> *"Read in the name of your Lord who created"* — Surah Al-Alaq

---

## 🕌 Our Courses

- **Quran Recitation** — Proper Quranic reading with Makharij
- **Hifz ul Quran** — Complete Quran memorization program
- **Tajweed Rules** — Rules of Quran recitation
- **Islamic Studies** — Comprehensive Deen education
- **Arabic Language** — Understand the Quran directly
- **Hadith & Seerah** — Prophetic traditions and biography

---

## 📊 Academy at a Glance

| Milestone | Count |
|---|---|
| Years of Experience | 10+ |
| Qualified Teachers | 25+ |
| Satisfied Students | 1500+ |
| Hafiz Graduates | 500+ |

---

## ⚙️ Requirements

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js & NPM

---

## 🚀 Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-username/bismillah-islamic-academy.git
cd bismillah-islamic-academy

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install && npm run dev

# 4. Copy environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Configure your database in .env
DB_DATABASE=bismillah_academy
DB_USERNAME=root
DB_PASSWORD=your_password

# 7. Run migrations
php artisan migrate --seed

# 8. Start the server
php artisan serve
```

---

## 📁 Project Structure

```
bismillah-islamic-academy/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── partials/
│       │   ├── topbar.blade.php
│       │   ├── header.blade.php
│       │   ├── footer.blade.php
│       │   └── enroll_modal.blade.php
│       └── pages/
│           ├── home.blade.php
│           ├── about.blade.php
│           ├── courses.blade.php
│           ├── team.blade.php
│           └── contact.blade.php
├── public/
│   ├── img/
│   ├── css/
│   ├── js/
│   └── lib/
└── routes/
    └── web.php
```

---

## 🗺️ Routes

| Route | Page |
|---|---|
| `/` | Home |
| `/about` | About Academy |
| `/courses` | Our Courses |
| `/team` | Our Teachers |
| `/contact` | Contact Us |
| `/enroll` | Enrollment Form |

---

## 🎨 Theme

| Color | Hex | Usage |
|---|---|---|
| Navy | `#0D1B2A` | Background, Navbar |
| Gold | `#AE8225` | Accents, Borders |
| White | `#FFFFFF` | Content Background |

**Fonts:** Cinzel (Headings) · Amiri (Arabic/Italic) · Lato (Body)

---

## 👨‍🏫 Meet Our Team

- **Sheikh Abdullah** — Principal & Quran Teacher
- **Ustaz Ibrahim** — Tajweed Specialist
- **Ustaza Fatima** — Islamic Studies Teacher

---

## 🤝 Contributing

Contributions are welcome! Please open an issue or submit a pull request.

---

## 🔒 Security

If you discover a security vulnerability, please contact us at **info@bismillahacademy.com**. All vulnerabilities will be promptly addressed.

---

## 📜 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
  Made with ❤️ for the Muslim Ummah<br>
  <strong>Bismillah Islamic Academy</strong> — Nurturing the Next Generation of Muslims
</p>
