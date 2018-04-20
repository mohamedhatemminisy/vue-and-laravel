<template>

	<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="" alt="minesy" width="112" height="28">
    </a>


   <div class="navbar-menu is-active">
    <router-link to="/home" class="navbar-item" >Home</router-link>
    <router-link to="/about" class="navbar-item" >About</router-link>
    <router-link to="/blog" class="navbar-item" >Blog</router-link>
   </div>

    <div class="navbar-burger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</nav>
</template>