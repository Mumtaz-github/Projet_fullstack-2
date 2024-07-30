 /* pour la page de categorie */

 function precedent()                    
 {
     document.getElementById("carouselcatprec").click();
 }
 
 function suivant()
 {
     document.getElementById("carouselcatsuiv").click();
 }



/* pour le page de contact*/

                                                            
document.addEventListener('DOMContentLoaded',function (){
  if(document.getElementById("formulaire")!=null){
 var formulaire = document.getElementById("formulaire")}})
  
 if(document.getElementById("formulaire")!=null){
  formulaire.addEventListener('submit', function dada(e)
  {
      e.preventDefault()
  
    valide=true
   a=document.getElementById("a").value; //nome
   b=document.getElementById("b").value;  //prenom
   c=document.getElementById("c").value;   //email
   d=document.getElementById("d").value;  //phonenumber
   e=document.getElementById("e").value;   //textarea
  
    filtrespecial = new RegExp(/^[a-zA-Z0-9_àáâãäåçèéêëìíîïòóôõöùúûüýÿ?-\s]+$/) //Caractère spécial
  filtrecar = new RegExp(/^[a-zA-Z0-9_àáâãäåçèéêëìíîïòóôõöùúûüýÿ?-\s]+$/)//demande or textarea
  filtrenum = new RegExp("^([0-9]{10})+$")//telephone
  filtremail = new RegExp("^[_a-z0-9-.]+@[_a-z0-9-]+.[a-z0-9]+$") //email
  
  resultat = filtrecar.test(a)   //nome
  if(resultat==false)
  {
    valide=false
    alert(
      "entrez votre nom svp")
  }
  
  resultat = filtrecar.test(b)  //prenom
    if(resultat==false)
    {
      valide=false
      alert("Entrez votre prenom svp ")
    }
  
    resultat = filtremail.test(c)                 //email
    if(resultat==false)
    {
      valide=false
      alert("doit comporter le caractère '@")
    }
    
  
  

  
  resultat = filtrenum.test(d)              //phonenumber
  if (resultat==false)
  {
  valide=false
  alert("Entrez votre phoneNumber")
  }
  
  resultat = filtrecar.test(e)  //textarea
    if(resultat==false)
    {
      valide=false
      alert("Entrez votre demande svp ")
    }
 
    
    if (valide)
      {
        console.log("Formulaire valide et prêt à être soumis")
        formulaire.submit()
        alert("Formulaire valide et prêt à être soumis")
      }
  
    })}




 




/*pour le page de commande */

document.addEventListener('DOMContentLoaded',function (){
  // if(document.getElementById("formule")!=null){
 var formule = document.getElementById("formule")})
  
  // if(document.getElementById("formule")!=null){
  formule.addEventListener('submit', function tot(g)
  {
      g.preventDefault()
  
    valide=true
   i=document.getElementById("i").value; //nome et prenom
   j=document.getElementById("email").value;   //email
   k=document.getElementById("k").value;  //phonenumber
   l=document.getElementById("l").value;   //textarea

   filtrespecial = new RegExp(/^[a-zA-Z0-9àáâãäåçèéêëìíîïòóôõöùúûüýÿ?-\s]+$/) //Caractère spécial
   filtrecar = new RegExp(/^[a-zA-Z0-9_àáâãäåçèéêëìíîïòóôõöùúûüýÿ?-\s]+$/) //pour demande
   filtrenum = new RegExp("^([0-9]{10})+$") //telephone
   filtremail = new RegExp("^[_a-z0-9-.]+@[_a-z0-9-]+.[a-z0-9]+$") //email
   
   resultat = filtrecar.test(i)   //nome
   if(resultat==false)
   {
     valide=false
     alert(
       "entrez votre nom & prenom svp")
   }
    resultat = filtremail.test(j)                 //email
     if(resultat==false)
     {
       valide=false
       alert("doit comporter le caractère '@")
     }
     
   resultat = filtrenum.test(k)              //phonenumber
   if (resultat==false)
   {
   valide=false
   alert("Entrez votre phoneNumber")
   }
   
   resultat = filtrecar.test(l)  //textarea
     if(resultat==false)
     {
       valide=false
       alert("Entrez votre demande svp")
     }
  
      if (valide)
       {
         console.log("Formulaire valide et prêt à être soumis")
         formule.submit()
         alert("Formulaire valide et prêt à être soumis")
       }
   
     })

