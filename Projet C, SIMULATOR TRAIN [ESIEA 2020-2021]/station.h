#ifndef STATION_H
#define STATION_H

#include"base.c"


/// AFFICHER LES TRAINS DANS LA STATION
void wagon(char Train1[],int Train1posx,int Train1posy,char Train2 [] ,int Train2posx,int Train2posy);


/////////////// TRAIN G->D  HORS STATION PASSAGER 
int TrajetGD (int j,int STOP, int tempsAttenteG,int Train1posy);


//////////////// TRAIN G->D STATION PASSAGER ARRRET  
int stop1 (int j, int STOP, int compteurarret1) ;


/////////////// TEMPS D'ATTENTE next TRAIN G -> D 	
int attenteG (int j, int tempsAttenteG);


/////////////// TRAIN D->G  HORS STATION PASSAGER  ////////////////
int TrajetDG (int g,int STOP, int tempsAttenteD,int Train2posy);


/////////////////// TRAIN D->G STATION PASSAGER ARRRET  
int stop2 (int g, int STOP, int compteurarret2) ;


/////////////// TEMPS D'ATTENTE next TRAIN D -> G 
int attenteD (int g, int tempsAttenteD);

#endif	
