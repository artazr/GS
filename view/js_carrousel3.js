$(document).ready(function(){
    s=new slider("#galerie");
});

var slider = function(id){
    var self=this;
    this.div=(id);
    this.slider=this.div.find('.slider');
    this.largeurCache = this.div.width();
    this.largeur=0;
    /* fonction qui calcule la longueur totale des images */
    this.div.find('a').each(function(){
        self.largeur+=$(this).width();
        self.largeur+=parseInt($(this).css("padding-left"));
        self.largeur+=parseInt($(this).css("padding-right"));
        self.largeur+=parseInt($(this).css("margin-left"));
        self.largeur+=parseInt($(this).css("margin-right"));
    });
    this.prec = this.div.find(".prec");
    this.suiv = this.div.find(".suiv");
    /* définition du saut : de combien les images défilent lorsqu'on appuie sur une flèche */
    this.saut = this.largeurCache/1.2;
    /* on ne prend pas en compte les 2 (car largeur slider = 2 sauts) premières vues */
    this.nbEtapes = Math.ceil(this.largeur/this.saut - this.largeurCache/this.saut); 
    /* position du saut à l'instant t */
    this.courant=0; 
    
    this.suiv.click(function(){
        if(self.courant<=self.nbEtapes){ /* si l'on a pas dépassé le nombre de "vues" max, on continue */
            self.courant++; /* avance à chaque fois que je clique sur la flèche */
            self.slider.animate({
                left:-self.courant*self.saut
            },1000); /* <-- vitesse de défilement */
        }
    });
            
    this.prec.click(function(){
        /* si l'on est au début, on ne peut pas aller en arrière */
        if(self.courant>0){
            /* recule à chaque fois qu'on clique sur la flèche */
            self.courant--; 
            self.slider.animate({
                left:-self.courant*self.saut
            },1000); /* <-- vitesse de défilement */
        }
    });
}