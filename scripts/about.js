const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry)=>{
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('show-section');
        }else{
            entry.target.classList.remove('show-section');
        }
    });
});

const reveals = document.querySelectorAll('.reveal');
reveals.forEach((el) => observer.observe(el));