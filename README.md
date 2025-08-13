# Organizations Contact Directory Management System

A comprehensive web application for managing organizations and their associated contacts, built as part of the ICTA Internship Program (July 2025).


## 📋 Overview

The Organizations Contact Directory System is a powerful yet simple web application that allows users to register and manage organizations (companies, nonprofits, institutions) along with their associated contacts. This system provides a centralized platform for maintaining business relationships and contact information.

## ✨ Key Features

### 🏢 Organization Management
- **Create & Edit Organizations**: Store comprehensive details including name, industry, website, tax ID, and more
- **Industry Classification**: Categorize organizations by industry using dropdown selection
- **Status Tracking**: Mark organizations as active/inactive for better data management
- **Logo Support**: Upload and display organization logos

### 👥 Contact Management
- **Add Contacts**: Store individuals linked to organizations with detailed information
- **Primary Contact Flag**: Identify the main point of contact for each organization
- **Multiple Contact Methods**: Support for email, office phone, and mobile numbers
- **Department Tracking**: Organize contacts by department and job title
- **Status Management**: Mark contacts as active/inactive

### 🔍 Advanced Features
- **Search Functionality**: Quick search by organization name or industry
- **Data Export**: Export organization and contact lists to CSV format
- **Responsive Design**: Mobile-friendly interface for on-the-go access
- **Data Validation**: Comprehensive form validation and error handling

## 🛠 Technology Stack

- **Backend**: PHP 8.0+ with Laravel Framework
- **Database**: MySQL
- **Frontend**: Blade Templates, HTML5, CSS3, JavaScript
- **Styling**: Bootstrap/Tailwind CSS
- **Authentication**: Laravel Auth (if implemented)

## 📊 Database Schema

The system uses a well-structured relational database with three main tables:

### Industries Table
- Stores industry categories for organization classification
- Supports active/inactive status for industry management

### Organizations Table
- Core organization information including name, description, website
- Links to industries table for categorization
- Supports logo uploads and tax ID storage

### Contacts Table
- Individual contact information linked to organizations
- Supports primary contact designation
- Multiple contact methods (email, office phone, mobile)
- Department and job title tracking

## 🚀 Installation & Setup

### Prerequisites
- PHP 8.0 or higher
- Composer
- MySQL 5.7 or higher
- Node.js & NPM (for asset compilation)

### Installation Steps

1. **Clone the repository**
   \`\`\`bash
   git clone https://github.com/Nonniegathoni/organization-contact.git
   cd organization-contact/contacts-backend
   \`\`\`

2. **Install PHP dependencies**
   \`\`\`bash
   composer install
   \`\`\`

3. **Environment setup**
   \`\`\`bash
   cp .env.example .env
   php artisan key:generate
   \`\`\`

4. **Configure database**
   - Update `.env` file with your database credentials
   - Create a new MySQL database

5. **Run migrations**
   \`\`\`bash
   php artisan migrate
   \`\`\`

6. **Seed the database (optional)**
   \`\`\`bash
   php artisan db:seed
   \`\`\`

7. **Install and compile assets**
   \`\`\`bash
   npm install
   npm run dev
   \`\`\`

8. **Start the development server**
   \`\`\`bash
   php artisan serve
   \`\`\`

Visit `http://localhost:8000` to access the application.

## 📱 User Stories & Functionality

### Organization Management
- ✅ Add new organizations with required and optional fields
- ✅ Edit existing organization information
- ✅ View paginated list of all organizations
- ✅ Search and filter organizations by name, industry, or status
- ✅ Activate/deactivate organizations without deletion

### Contact Management
- ✅ Add contacts to organizations with comprehensive details
- ✅ Designate primary contacts (one per organization)
- ✅ View all contacts associated with an organization
- ✅ Manage contact status (active/inactive)

### Data Management
- ✅ Industry dropdown for consistent data entry
- ✅ Search functionality across organizations and contacts
- ✅ CSV export capability for external use

## 🎯 Project Highlights

This project demonstrates proficiency in:
- **Full-stack web development** using Laravel framework
- **Database design** with proper relationships and constraints
- **User experience design** with intuitive interfaces
- **Data management** with CRUD operations and validation
- **Professional development practices** with clear documentation

## 📸 Screenshots

*Add screenshots of your application here to showcase the user interface*

## 🔧 API Endpoints (if applicable)

Document your API endpoints here if you've implemented an API layer.

## 🧪 Testing

\`\`\`bash
# Run feature tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
\`\`\`

## 🚀 Deployment

### Production Optimization
\`\`\`bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
\`\`\`

### Recommended Hosting Platforms
- **DigitalOcean App Platform**
- **Heroku** (with Laravel buildpack)
- **AWS Elastic Beanstalk**
- **Shared hosting** with cPanel support

## 🤝 Contributing

This project was developed as part of the ICTA Internship Program. For suggestions or improvements:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request


## 👨‍💻 Developer

**Nonnie Gathoni**
- GitHub: [@Nonniegathoni](https://github.com/Nonniegathoni)


