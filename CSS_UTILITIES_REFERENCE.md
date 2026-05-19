# CSS Utilities Reference

Panduan lengkap untuk semua CSS utilities dan classes yang tersedia di SIREJU.

## 🎨 Button Classes

### Primary Buttons
```html
<!-- Gradient Button -->
<button class="btn-refined">Click Me</button>

<!-- Accent Button (Teal) -->
<button class="btn-accent">Action</button>

<!-- Full Gradient Primary -->
<button class="btn-primary">Submit</button>
```

### Outline Buttons
```html
<button class="btn-refined-outline">Cancel</button>
```

### Custom Gradient Buttons
```html
<!-- Blue-Indigo Gradient -->
<a href="#" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold">
    Click
</a>

<!-- Emerald-Teal Gradient -->
<button class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-xl font-bold">
    Success
</button>

<!-- Red-Pink Gradient -->
<button class="px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-xl font-bold">
    Delete
</button>
```

## 🎴 Card Classes

### Basic Card
```html
<div class="card-surface p-6">
    <h3>Card Title</h3>
    <p>Card content here</p>
</div>
```

### Card with Gradient Background
```html
<div class="card-gradient p-8">
    <h3>Gradient Card</h3>
</div>
```

### Glass Morphism Card
```html
<div class="card-glass backdrop-blur-lg p-6 rounded-xl">
    <h3>Glass Card</h3>
</div>
```

## 🏷️ Badge Classes

```html
<!-- Primary Badge -->
<span class="badge-primary">Primary</span>

<!-- Success Badge -->
<span class="badge-success">Success</span>

<!-- Warning Badge -->
<span class="badge-warning">Warning</span>

<!-- Danger Badge -->
<span class="badge-danger">Danger</span>

<!-- Info Badge -->
<span class="badge-info">Info</span>
```

## 📝 Text Styles

### Gradient Text
```html
<!-- Blue-Purple Gradient -->
<h1 class="text-gradient text-4xl font-bold">Gradient Text</h1>

<!-- Warm Gradient (Orange-Pink) -->
<h2 class="text-gradient-warm text-3xl font-bold">Warm Text</h2>

<!-- Cool Gradient (Teal-Cyan) -->
<h3 class="text-gradient-cool text-2xl font-bold">Cool Text</h3>
```

### Using Tailwind gradient classes
```html
<!-- Text with bg-clip-text -->
<h1 class="text-4xl font-bold text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text">
    Modern Title
</h1>
```

## 🌟 Shadow & Glow Effects

### Colored Shadows
```html
<!-- Blue Shadow -->
<div class="shadow-blue p-6 rounded-lg">Blue Shadow</div>

<!-- Emerald Shadow -->
<div class="shadow-emerald p-6 rounded-lg">Emerald Shadow</div>

<!-- Purple Shadow -->
<div class="shadow-purple p-6 rounded-lg">Purple Shadow</div>
```

### Glow Effects
```html
<!-- Blue Glow -->
<div class="glow-blue p-6">Glowing Element</div>

<!-- Emerald Glow -->
<div class="glow-emerald p-6">Glow Emerald</div>

<!-- Purple Glow -->
<div class="glow-purple p-6">Glow Purple</div>
```

## ✨ Animation Classes

### Fade In Animations
```html
<!-- Fade In Up -->
<div class="fade-in-up">
    <h1>Fades in with upward motion</h1>
</div>

<!-- Staggered Animations -->
<div class="fade-in-up-delay-1">First element</div>
<div class="fade-in-up-delay-2">Second element</div>
<div class="fade-in-up-delay-3">Third element</div>
```

### Slide and Float Animations
```html
<!-- Slide Down -->
<div class="slide-in-down">
    Slides down from top
</div>

<!-- Float Animation -->
<div class="float-animation">
    Floating element
</div>

<!-- Glow Effect -->
<div class="glow-effect">
    Pulsing glow
</div>
```

## 🎯 Input Fields

### Modern Input Styling
```html
<!-- Dengan styling default dari app.css -->
<input type="text" placeholder="Type here..." class="w-full">

<!-- Custom styled input -->
<div class="relative">
    <input type="email" placeholder="Email" class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
        <i class="fas fa-envelope text-blue-500"></i>
    </div>
</div>
```

## 🔄 Hover & Transition Effects

### Scale Effects
```html
<!-- Hover Scale 110% -->
<button class="hover:scale-110 transition-all duration-300">
    Scale on Hover
</button>

<!-- Hover Scale 105% -->
<div class="hover:scale-105 transition-all duration-300">
    Slightly Scale
</div>
```

### Translate Effects
```html
<!-- Move Up on Hover -->
<button class="hover:-translate-y-0.5 transition-all duration-200">
    Move Up
</button>

<!-- Move Down on Hover -->
<button class="hover:translate-y-1 transition-all duration-200">
    Move Down
</button>
```

### Shadow Lift
```html
<!-- Lift with shadow -->
<div class="hover:shadow-3xl hover:-translate-y-2 transition-all duration-300">
    Lifting element
</div>
```

## 📐 Sizing & Spacing

### Rounded Corners
```html
<!-- Small radius -->
<div class="rounded-lg">...</div>

<!-- Medium radius -->
<div class="rounded-xl">...</div>

<!-- Large radius -->
<div class="rounded-2xl">...</div>

<!-- Extra large -->
<div class="rounded-3xl">...</div>
```

### Padding & Margin
```html
<!-- Padding -->
<div class="p-4">Small padding</div>
<div class="p-6">Medium padding</div>
<div class="p-8">Large padding</div>

<!-- Margin -->
<div class="mb-4">Bottom margin</div>
<div class="mt-6">Top margin</div>
<div class="mx-auto">Center horizontally</div>
```

## 🎨 Complete Examples

### Example 1: Modern Card with Action
```html
<div class="card-surface p-8 rounded-xl hover:shadow-xl hover:border-2 hover:border-blue-300 transition-all">
    <div class="flex items-center gap-4 mb-4">
        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center text-blue-600">
            <i class="fas fa-heart text-lg"></i>
        </div>
        <h3 class="text-lg font-bold">Title</h3>
    </div>
    <p class="text-gray-600 mb-4">Description here</p>
    <button class="btn-refined">Action</button>
</div>
```

### Example 2: Feature Section
```html
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="card-surface p-8 text-center rounded-xl hover:shadow-xl hover:border-2 hover:border-blue-300">
        <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center text-blue-600 mb-4 mx-auto">
            <i class="fas fa-bolt text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold mb-2">Feature</h3>
        <p class="text-gray-600 text-sm">Feature description</p>
    </div>
</div>
```

### Example 3: Form with Modern Inputs
```html
<form class="space-y-6">
    <div>
        <label class="block text-sm font-bold text-gray-800 mb-2">
            Email
        </label>
        <input type="email" placeholder="your@email.com" class="w-full">
    </div>
    
    <button type="submit" class="w-full btn-refined">
        Submit
    </button>
</form>
```

## 🔗 Global Classes Available

- `.transition-smooth` - Smooth CSS transition
- `.focus-ring` - Custom focus ring style
- `.glass` - Glass morphism effect
- `.hover:scale-110` - Scale up on hover
- `.hover:scale-105` - Scale slightly on hover
- `.hover:shadow-3xl` - Large shadow on hover
- `.shadow-3xl` - Extra large shadow
- `.flex`, `.grid` - Flexbox and Grid utilities (Tailwind)
- `.w-full`, `.h-full` - Full width/height
- `.rounded-{size}` - Border radius
- `.p-{size}` - Padding
- `.m-{size}` - Margin
- `.text-{color}` - Text colors
- `.bg-{color}` - Background colors

## 📚 Documentation

Untuk referensi lengkap Tailwind CSS, kunjungi: https://tailwindcss.com/docs

---

**Last Updated**: December 12, 2025
