
  
  const menuLinks = document.querySelectorAll('.menu a');

  menuLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault()
  
      // Remove active class from all links
      menuLinks.forEach((link) => {
        link.classList.remove('active')
      })
  
      // Add active class to clicked link
      link.classList.add('active')
    })
  })
  

