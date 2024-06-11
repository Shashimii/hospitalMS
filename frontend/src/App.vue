<template>
  <!--<nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
  </nav>-->
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /* text-align: center; */
  color: #2c3e50;
}

* {
  margin: 0;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

/* Input Field Styles */
input[type="text"],
input[type="email"],
input[type="password"] {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box; 
}

/* Label Styles */
label {
  display: block;
  margin-bottom: 5px; 
  font-weight: bold; 
}

/* Select Styles */
select {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box;
  appearance: none; 
  background-image: url('data:image/svg+xml;utf8,<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="%23333" d="M3 7l7 7 7-7H3z"/></svg>'); /* Custom arrow icon */
  background-repeat: no-repeat;
  background-position-x: calc(100% - 10px);
  background-position-y: center;
}

select:hover,
select:focus {
  border-color: #007bff; 
}

select option {
  padding: 10px;
}
</style>
