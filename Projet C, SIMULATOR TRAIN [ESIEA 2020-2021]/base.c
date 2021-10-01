

#include "base.h"




	
				
	
	
	
	
		/////////////////////      AFFICHAGE  D'UN FICHIER TXT          //////////////////////////
	
	
	void affichage (char emplacement[])
	{
		FILE* fichier = NULL;
		char chaine[TAILLE_MAX] = "";
		fichier = fopen(emplacement, "r");
		
		if (fichier != NULL)
		{
			while (fgets(chaine, TAILLE_MAX, fichier) != NULL) // On lit le fichier tant qu'on ne reçoit pas d'erreur (NULL)
			{
	    			printf("%s", chaine); // On affiche la chaîne qu'on vient de lire
			}
		 
			fclose(fichier);
		}
 
	
	}
	
	
	
	//////////////////////////////////////////// OTHER MENU ////////////////////////////
	
	
	
	
int affichage2 (char emplacement[])
	{
	

		
				
  	FILE* fichier = NULL;
	char chaine[TAILLE_MAX] = "";
	 
	fichier = fopen(emplacement, "r");
	 
	if (fichier != NULL)
		{
			while (fgets(chaine, TAILLE_MAX, fichier) != NULL) // On lit le fichier tant qu'on ne reçoit pas d'erreur (NULL)
				{
			    		printf("%s", chaine); // On affiche la chaîne qu'on vient de lire
				}
		 
			fclose(fichier);
		}
 
	return 0;
	}

	
	
//////////////////   Creation d'un nombre aléatoire pour le temps d'attente des TRAINS        //////////////////
		
	
	
	
	
	
		
	int aleat () 					
	{
	    	int nbgen=rand()%8+1;    // entre 1-9	    		
		return nbgen;
	}
			
			
			
			
			
			
	
	void wagon(char Train1[],int Train1posx,int Train1posy,char Train2 [] ,int Train2posx,int Train2posy) 
	
	
	{
					 		
			printf("\033[1;37m\033[%d;%dH %s",Train1posx,Train1posy,Train1);
			printf("\033[1;37m\033[%d;%dH %s",Train2posx,Train2posy,Train2);
			printf("\033[1;37m\033[%d;%dH=",Train1posx,Train1posy+34);   
			printf("\033[1;37m\033[%d;%dH=",Train2posx,Train2posy-1);    

			printf("\033[25;56H 🔳🔳🔳🔳🔳🔳\n");
			printf("\033[27;56H 🔳🔳🔳🔳🔳🔳\n");
			
			
			printf("\033[25;149H🔳🔳🔳🔳\n");
			printf("\033[27;149H🔳🔳🔳🔳\n");
			
			printf("\033[1;37m\033[25;56H=🔳🔳🔳🔳🔳🔳\n");
			printf("\033[1;37m\033[27;56H=🔳🔳🔳🔳🔳🔳\n");
			printf("\033[25;149H🔳🔳🔳🔳\n");
			printf("\033[27;149H🔳🔳🔳🔳\n");
			printf("\033[27;1H                                         \n");
			printf("\033[25;1H                                         \n");
			printf("\033[27;181H                                             \n");
			printf("\033[25;181H                                             \n");
			
			
			



					}

