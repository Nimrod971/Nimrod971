#ifndef BASE_H
#define BASE_H

#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>
#include <signal.h>
#include <string.h>
#include <termios.h>
#include <unistd.h>
#include <fcntl.h>
#include <time.h>

#define TAILLE_MAX 1000 // Tableau de taille 1000


/// STRUCTURE DU TRAIN

	typedef struct train TRAIN;
	
	struct train	{
	
		char direction ;  /*N => Nord, S => Sud, E => EST, O => OUEST*/
		int posx;         /*Position courante x de la tête du train*/
		int posy;         /*Position courante y de la tête du train*/
		int vitesse;      /*Vitesse du train*/
		char custom [200]; /*Contient le train customisé, il faut choisirla bonne taille de votre tableau*/
		int etat;        /*État du train => dehors, entrant, stationné,sortant, sorti*/
		int porte ;      /*Portes ouvertes 1 ou fermées 0 */
		/*Vous pouvez bien-sur rajouter d’autres variables si nécessaire*/
	};

/// STRUCTURE DU VOITURE

	typedef struct car CAR;
	
	struct car	{
	
		int pos2x;
		int pos2y;
		int posx;         /*Position courante x de la tête du train*/
		int posy;         /*Position courante y de la tête du train*/
		char custom [10]; /*Contient le train customisé, il faut choisirla bonne taille de votre tableau*/
	
		/*Vous pouvez bien-sur rajouter d’autres variables si nécessaire*/
	};

	
///      AFFICHAGE  D'UN FICHIER TXT
void affichage (char emplacement[]);


/////   Creation d'un nombre aléatoire 
int aleat();	

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
