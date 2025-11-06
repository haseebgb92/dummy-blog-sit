// TechPulse Blog - Main JavaScript File

// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeDarkMode();
    initializeMobileMenu();
    initializeSearch();
    initializeLazyLoading();
    initializeBackToTop();
    initializeCategoryFilters();
    initializeLoadMore();
    initializeSmoothScroll();
    initializeFormHandlers();
    initializeCategoryPages();
});

// Dark Mode Toggle
function initializeDarkMode() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;
    
    // Check localStorage for saved preference
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
        html.classList.add('dark');
    }
    
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            html.classList.toggle('dark');
            const isDark = html.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
    }
}

// Mobile Menu Toggle
function initializeMobileMenu() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('open');
            mobileMenu.classList.toggle('hidden');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.remove('open');
                mobileMenu.classList.add('hidden');
            }
        });
    }
}

// Search Functionality
function initializeSearch() {
    const searchBtn = document.getElementById('searchBtn');
    const searchModal = document.getElementById('searchModal');
    const closeSearch = document.getElementById('closeSearch');
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    
    // Mock search data (replace with actual API call in production)
    const searchData = [
        { title: 'The Future of AI: Machine Learning Transforming Industries', url: 'single-post.html', category: 'AI Insights' },
        { title: 'Revolutionary Robotics: The Next Wave of Automation', url: 'single-post.html', category: 'Robotics' },
        { title: 'UAE Tech Startups: Leading Innovation in 2025', url: 'single-post.html', category: 'Startups' },
        { title: 'Smart Home Technology: The Complete Guide for 2025', url: 'single-post.html', category: 'Gadgets' },
        { title: 'AI in Healthcare: Revolutionizing Patient Care', url: 'single-post.html', category: 'AI Insights' },
    ];
    
    if (searchBtn && searchModal) {
        searchBtn.addEventListener('click', function() {
            searchModal.classList.remove('hidden');
            searchModal.classList.add('open');
            setTimeout(() => searchInput?.focus(), 100);
        });
    }
    
    if (closeSearch) {
        closeSearch.addEventListener('click', function() {
            searchModal.classList.add('hidden');
            searchModal.classList.remove('open');
            if (searchInput) searchInput.value = '';
            if (searchResults) searchResults.innerHTML = '';
        });
    }
    
    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && searchModal && !searchModal.classList.contains('hidden')) {
            closeSearch?.click();
        }
    });
    
    // Search functionality
    if (searchInput && searchResults) {
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.toLowerCase().trim();
            
            if (query.length < 2) {
                searchResults.innerHTML = '';
                return;
            }
            
            searchTimeout = setTimeout(() => {
                const results = searchData.filter(item => 
                    item.title.toLowerCase().includes(query) || 
                    item.category.toLowerCase().includes(query)
                );
                
                displaySearchResults(results, query);
            }, 300);
        });
    }
}

function displaySearchResults(results, query) {
    const searchResults = document.getElementById('searchResults');
    if (!searchResults) return;
    
    if (results.length === 0) {
        searchResults.innerHTML = '<p class="text-gray-500 dark:text-gray-400 p-4">No results found for "' + query + '"</p>';
        return;
    }
    
    searchResults.innerHTML = results.map(item => `
        <a href="${item.url}" class="block p-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
            <h4 class="font-bold mb-1">${highlightText(item.title, query)}</h4>
            <span class="text-sm text-gray-500 dark:text-gray-400">${item.category}</span>
        </a>
    `).join('');
}

function highlightText(text, query) {
    const regex = new RegExp(`(${query})`, 'gi');
    return text.replace(regex, '<mark class="bg-yellow-200 dark:bg-yellow-800">$1</mark>');
}

// Lazy Loading Images
function initializeLazyLoading() {
    const images = document.querySelectorAll('img.lazy-load');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        images.forEach(img => {
            img.classList.add('loaded');
        });
    }
}

// Back to Top Button
function initializeBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
        
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

// Category Filters
function initializeCategoryFilters() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const categoryPosts = document.getElementById('categoryPosts');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Remove active class from all filters
            categoryFilters.forEach(f => f.classList.remove('active'));
            // Add active class to clicked filter
            this.classList.add('active');
            
            const category = this.getAttribute('data-category');
            filterPostsByCategory(category);
        });
    });
}

function filterPostsByCategory(category) {
    const posts = document.querySelectorAll('#categoryPosts .post-card');
    
    posts.forEach(post => {
        if (category === 'all') {
            post.style.display = 'block';
            post.classList.add('fade-in');
        } else {
            const postCategory = post.getAttribute('data-category');
            if (postCategory === category) {
                post.style.display = 'block';
                post.classList.add('fade-in');
            } else {
                post.style.display = 'none';
            }
        }
    });
}

// Load More Button
function initializeLoadMore() {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // Simulate loading more posts
            this.textContent = 'Loading...';
            this.classList.add('loading');
            
            setTimeout(() => {
                this.textContent = 'Load More Articles';
                this.classList.remove('loading');
                // In production, this would fetch and append new posts
                alert('Load more functionality would fetch and display additional articles here.');
            }, 1000);
        });
    }
}

// Smooth Scroll
function initializeSmoothScroll() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

// Form Handlers
function initializeFormHandlers() {
    // Newsletter Form
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            // In production, integrate with Mailchimp or backend API
            alert('Thank you for subscribing! Check your email for confirmation.');
            this.reset();
        });
    }
    
    // Contact Form
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // In production, send to backend API
            alert('Thank you for your message! We\'ll get back to you soon.');
            this.reset();
        });
    }
    
    // Submission Form
    const submissionForm = document.getElementById('submissionForm');
    if (submissionForm) {
        submissionForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // In production, send to backend API
            alert('Thank you for your submission! We\'ll review your article and get back to you within 5-7 business days.');
            this.reset();
        });
    }
}

// Category Pages
function initializeCategoryPages() {
    // Check if we're on a category page
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('cat');
    
    if (category) {
        const categoryTitle = document.getElementById('categoryTitle');
        const categoryDescription = document.getElementById('categoryDescription');
        
        const categoryData = {
            'ai': {
                title: 'Artificial Intelligence',
                description: 'Explore the latest insights, trends, and breakthroughs in artificial intelligence and machine learning.'
            },
            'gadgets': {
                title: 'Gadgets & Devices',
                description: 'Stay updated with the latest gadget reviews, tech products, and device innovations.'
            },
            'startups': {
                title: 'Startups & Innovation',
                description: 'Discover the latest startup news, funding rounds, and innovation stories from the tech ecosystem.'
            },
            'reviews': {
                title: 'Tech Reviews',
                description: 'In-depth reviews and analysis of the latest technology products and services.'
            },
            'robotics': {
                title: 'Robotics',
                description: 'Latest developments in robotics, automation, and intelligent systems.'
            },
            'innovations': {
                title: 'Innovations',
                description: 'Cutting-edge technological innovations and breakthrough developments.'
            }
        };
        
        if (categoryData[category]) {
            if (categoryTitle) categoryTitle.textContent = categoryData[category].title;
            if (categoryDescription) categoryDescription.textContent = categoryData[category].description;
        }
        
        // Filter posts if on category page
        if (document.getElementById('categoryPosts')) {
            filterPostsByCategory(category);
            // Update active filter button
            const filterBtn = document.querySelector(`[data-category="${category}"]`);
            if (filterBtn) {
                document.querySelectorAll('.category-filter').forEach(btn => btn.classList.remove('active'));
                filterBtn.classList.add('active');
            }
        }
    }
}

// Header Scroll Effect
window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('shadow-md');
        } else {
            header.classList.remove('shadow-md');
        }
    }
});

// Performance: Debounce function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Optimize scroll events
const optimizedScroll = debounce(function() {
    // Scroll-dependent functionality here
}, 10);

window.addEventListener('scroll', optimizedScroll);

// Console welcome message
console.log('%cTechPulse Blog', 'color: #3b82f6; font-size: 20px; font-weight: bold;');
console.log('%cWelcome to TechPulse! 🚀', 'color: #10b981; font-size: 14px;');

