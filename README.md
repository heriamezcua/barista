# Table of Contents
- [Introduction](#introduction)
- [Goals](#goals)
- [Technologies used and reasons](#technologies-used-and-reasons)
  - [Frontend](#frontend)
  - [Backend](#backend)
  - [Payment Platform](#payment-platform)
  - [Incident Tracking and Project Management](#incident-tracking-and-project-management)
  - [Hosting](#hosting)
  - [Domain Manager](#domain-manager)
- [Use case diagram](#use-case-diagram)
- [Application Structure](#application-structure)
- [Device Compatibility](#device-compatibility)
- [Main Features](#main-features)
  - [Barista Coffee E-commerce](#barista-coffee-e-commerce)
  - [Barista Admin Panel](#barista-admin-panel)
- [Demo](#demo)

## Introduction

Barista is a web application, specifically an online store focused on the sale of coffee-related products. The application consists of two interfaces:  

- **Customer Interface**: Allows users to navigate through the store, purchase products, and write reviews.  
- **Administration Panel**: Enables administrators to add products, approve reviews, manage orders, and more.  

Additionally, the application integrates **Stripe** as a payment platform in a fully customized manner.

## Goals

I decided to create an e-commerce website for selling coffee products because I believe it is a crucial feature for businesses in today's digitalized world. Additionally, this project requires the integration of various technologies that I have learned over the past two years of higher education.  

Another key reason is the existing demand for this type of website, which presents an opportunity to attract potential clients who need an online store with payment processing capabilities.  

Specifically, **Barista’s main objective is to maximize product sales**.

## Technologies Used and Reasons

### Development Environment

<img src="https://github.com/user-attachments/assets/916cad94-2c4d-4cd4-b506-689e8248c4b3" width="75" height="75"></br>
- **PHPStorm**: I chose PHPStorm as my development environment not only because it was the IDE used at work but also to gain experience with a different environment than VS Code and learn new things.

### Frontend

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original.svg" width="75" height="75"></br>
- **HTML5**: Used for structuring the web pages. I chose HTML5 as recommended by W3C, benefiting from its features like clear semantic structure, multimedia integration, improved forms, and enhanced performance.

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original.svg" width="75" height="75"></br>
- **CSS3**: Applied for styling various elements of the website. CSS3 allows custom animations and styles, and with **Flexbox**, it provides a layout module that greatly helps in making the website responsive.

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/sass/sass-original.svg" width="75" height="75"></br>
- **Sass**: Utilized as a CSS preprocessor to introduce programming-like features, nest CSS classes, and improve development efficiency.

- **BEM Methodology**: (Block, Element, Modifier)  
  A naming convention and structuring method for CSS to ensure scalable and maintainable styles.  

  - **Block**: Independent and meaningful UI components.  
  - **Element**: Parts of a block that don't have standalone meaning.  
  - **Modifier**: Variations that alter the appearance or behavior of a block or element.  

  **Example using Sass with BEM:**
  ```scss
  .btn {
     background: none;

     &--primary {
         display: inline-block;
         font-weight: 500;
         font-size: var(--default-font-size);
         color: white;
         padding: 0.5rem 1rem;
         background-color: var(--color-primary);

         &:hover,
         &:focus,
         &:active {
             background-color: var(--color-primary-dark);
         }
     }
  }

## Backend

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg" width="75" height="75"></br>
- **PHP**: I chose PHP for this web application because it is the language I have been working with during my internship and in recent months of class.  

  PHP is widely used for web development due to its ease of use, broad community support, and continuous performance improvements with frequent updates.

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg" width="75" height="75"></br>
- **Laravel**: To streamline development, I selected Laravel, as it is the PHP framework I have used most during my internship.  

  Laravel simplifies development with features such as:
  - A straightforward **routing system**.
  - Efficient **database management** with its ORM, **Eloquent**.
  - **Security** mechanisms, including CSRF tokens.
  - An implementation of the **Model-View-Controller (MVC)** architecture, which I have previously used in other projects.

<p align="center">
  <img src="https://github.com/user-attachments/assets/2c184c90-1c56-47e6-9c0d-2a5d228da69d">
</p>


<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mariadb/mariadb-original.svg" width="75" height="75"></br>
- **MariaDB**: Chosen as the relational database management system due to my familiarity with its syntax, its seamless integration with Laravel, and its open-source nature.

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/apache/apache-original.svg" width="75" height="75"></br>
- **Apache2**: I opted for Apache2 as the web server for deploying my application since it is widely used, open-source, and actively maintained by the Apache Foundation.

## Package Manager

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/npm/npm-original-wordmark.svg" width="75" height="75"></br>
- **NPM**: Used for managing application dependencies and installing software modules like Bootstrap, Sass, and Vite.

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/composer/composer-original.svg" width="75" height="75"></br>
- **Composer**: Chosen as the PHP dependency manager, required for Laravel projects. Additionally, it was necessary for implementing **Stripe** as a payment platform.

## Graphical Database Manager

- **Navicat Premium 16**: Selected as the graphical database manager since it was used during my internship. It offers powerful functionalities that simplify database management.

## Payment Platform

- **Stripe**: Chosen for its **security** (compliant with PCI DSS Level 1), **ease of implementation**, and **scalability**, making it simple to reuse in future projects.

## Incident Tracking and Project Management

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/jira/jira-original.svg" width="75" height="75"></br>
- **Jira**: Used for issue tracking and project management. It was the tool used during my internship, making it useful for learning and maintaining a record of errors.

## Hosting

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/oracle/oracle-original.svg" width="100" height="50"></br>
- **Oracle Bare Metal Server**: Chosen as the hosting provider, specifically their **Madrid data center**. The decision was based on their **free and powerful machine offering**.

## Domain Manager

- **Hostinger**: Selected due to prior experience using it and its **user-friendly interface**.

## Use case diagram
<p align="center">
  <img src="https://github.com/user-attachments/assets/eb14c213-f9a9-4261-bcbc-517c98506105">
</p>


## Application Structure

The project follows the **Laravel 10** structure. The key folders and files that influence the project are:

### **Main Folders**

#### **app/**
- **Http/**
  - **Controllers/**: Contains the files that handle the application logic, process user input, and return the appropriate views.
  - **Middlewares/**: Includes middleware files that act as an intermediary before a request reaches the controller. The most important in this project is `AdminController`, which I created.
  - **Models/**: Stores the models representing database tables.
  - **Providers/**: Contains service providers, essential to Laravel's bootstrapping system. I modified `AppServiceProvider` to use **Bootstrap 5** in pagination instead of Tailwind.

#### **config/**
- Stores configuration files for the application.
- **app.php**: Manages general app settings.
- **stripe.php**: Holds Stripe's public and private API keys.

#### **database/**
- **migrations/**: Stores the database migration files created during project development.

#### **node_modules/**
- Contains all NPM packages and dependencies. The most significant is **Bootstrap**, which was installed via NPM.

#### **resources/**
- **css/**: Contains compiled CSS files from Sass.
- **js/**: Stores compiled JavaScript files.
- **sass/**: Houses `.scss` files to be compiled with Vite.
- **views/**: Contains all application views:
  - **admin/**: Views and components for the admin panel.
  - **components/**: Blade components used throughout the project.
  - **layouts/**: Views that serve as templates for other pages.
  - **pages/**: Views for all e-commerce store pages.
  - **partials/**: Reusable views across different sections.
  - **vendor/**: Customized pagination views.

#### **routes/**
- **web.php**: Defines all routes for both the web application and admin panel.

#### **storage/**
- Stores product images. A symbolic link connects this folder to `public/` for accessibility.

#### **vendor/**
- Stores Composer dependencies. The most crucial package installed is **Stripe**.

---

### **Important Files**
- **.env**: Holds environment variables for configuring database connections, email settings, and API credentials.
- **package.json**: Defines project dependencies, scripts, and metadata for NPM.
- **composer.json**: Defines PHP dependencies and configurations for Composer.
- **vite.config.js**: Contains Vite configurations for frontend development.


## Device Compatibility

This online store is compatible with both desktop and mobile devices. All this thanks to its responsive design that adapts to any screen.

### The browsers supported by the web are:

#### Supported mobile browsers:
![image](https://github.com/user-attachments/assets/95819eea-f14d-471f-9df0-4d78f56403b2)

#### Supported computer browsers:
![image](https://github.com/user-attachments/assets/4769c67e-18ab-46d4-955c-1e8fd618081c)



## Main Features

### Barista Coffee E-commerce

#### 1. Registration and Login
- Users can register by providing their name, email, and password.
- Registered users can log in using their credentials.

#### 2. Wishlist
- **Add Products to Wishlist:** Registered users can save products for later.
- **Remove Products from Wishlist:** Users can remove items they no longer want.

#### 3. Cart
- **Add Products to Cart:** Users can add products to their shopping cart while browsing.

#### 4. Checkout
- **Unregistered User Checkout:** Redirected to login before purchase.
- **Registered User Checkout:** Complete purchase with shipping details and payment via Stripe.

#### 5. View Orders
- Users can track order status, ID, item count, and cost in their personal account.

#### 6. Ratings & Reviews
- **View Reviews:** Anyone can read product reviews.
- **Add Review:** Only registered users can submit reviews with a rating (1-5), title, and description.
- **Review Moderation:** Reviews require admin approval before being visible.
- **Edit Review:** Users can modify their reviews, requiring re-approval.
- **Delete Review:** Users can remove their reviews.
- **Update Quantities and Delete Products:** Modify cart product quantities or remove items.

#### 7. Search Page
- **Search Function:** Users can search for products via the navigation bar.
- **Sort By:** Price, popularity, best sellers, newest.
- **Filter By:** Category, type of coffee, variety, caffeine content.

---

### Barista Admin Panel

#### Dashboard
- Displays the most recent reviews for admin approval.

#### Products
- View all products with key details.

#### Create Product
- Products have fields: title, category, price, images, discount, and description.
- **Product Categories:**
  - ##### Coffee Beans
    - Fields include packaging format, decaffeination status, and type.
  - ##### Pods
    - Fields include quantity, size, and variety.
  - ##### Machines
    - Fields include available colors, water tank capacity, and automation.
  - ##### Accessories
    - Generic category for machine parts and softeners.

#### Edit Product
- **Same Category:** Update product details without changing the category.
- **Change Category:** Deletes and recreates the product in a new category.

#### Delete Product
- Admin can remove products, also deleting associated categories.

#### Colors
- The administrator will be able to create the colors needed for product machines.

##### Create Color
- The administrator can define new colors for coffee machines.

##### Delete Color
- Unused colors can be removed using the delete button.

#### Orders
- When a user completes a purchase, an order is generated and listed in the admin panel.

##### View Order
- The administrator can access detailed order information, including username, email, and Stripe payment method ID.

##### Change Order Status
- Orders can be updated between statuses: **pending, processing, completed, or canceled.**

## Demo

### Home
![image](https://github.com/user-attachments/assets/5eb386f7-7481-4dd8-ade6-7c98ccbbd2da)

### Search
![image](https://github.com/user-attachments/assets/c784c892-b3e4-4598-80ec-bd9fd9308a80)

### Product
![image](https://github.com/user-attachments/assets/e5f3c483-42e3-47ac-bbe2-70c83776e704)

### Cart
![image](https://github.com/user-attachments/assets/e0778dd3-76c2-447f-96c4-1a5264ff3e5d)

### User Profile
![image](https://github.com/user-attachments/assets/a32feb73-1dec-4e61-9fee-42b10f16d740)

### Admin Panel
![image](https://github.com/user-attachments/assets/9e8cd7ed-dcc3-47d3-827d-b535d24abda7)


