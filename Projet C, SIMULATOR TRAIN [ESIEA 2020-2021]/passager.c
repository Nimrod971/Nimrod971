#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <math.h>
#include <unistd.h>
#define TAILLE_MAX 1000 // Tableau de taille 1000



//////////////////////   ALEATOIRE    ///////////////////////////////



		
		
int aleat1 (int limit) 					
	{
	    	int nbgen=rand()%limit;    // entre 0-(limit-1)	    		
		return nbgen;
	}



char matrix[40][16];
char number = '1';
/*
   FILE * dplt = fopen("matrix.txt","r+"); // lecture de la matrice de collision 
   for(int i=0;i<43;i++)
   {
   int j=0;
   while((c=fgetc(dplt)) != '\n'){
   aff[i][j]=c;
   j++;
   }

   }
   */
typedef struct voyageur Voyageur;
struct voyageur
{

		int colour;						/*couleur passager*/ 	
		int Sortie;						/*Sortie 1 OUI 0 NON*/
		int entre;						/*porte d'entrée   1 ou 2 ou 3 ou 4   */
		int posx;      		   /*Position courante x de la tête du train*/
		int posy;      		   /*Position courante y de la tête du train*/
		int Arposx;         /*Position courante x de la tête du train*/
		int Arposy;         /*Position courante y de la tête du train*/

		char custom; /*Contient le voyageur */



	Voyageur *suivant;
	int x;
	int y;
};





typedef struct Liste Liste;
struct Liste
{
	Voyageur *premier;
};



//Initialise une liste chaînée de voyageurs vide
Liste *initialisation()
{
		Liste *liste = malloc(sizeof(*liste));
		Voyageur *element = malloc(sizeof(*element));

		if (liste == NULL || element == NULL)
		{
			exit(EXIT_FAILURE);
		}

		element->custom='X';
		/////////  COULEUR //////////////////////
		int COLOR[6]={31,32,33,34,35,36};
		int color=aleat1(6);
		element->colour=COLOR[5];
		
			int TABporte[2]={2,1};		////////// Porte 
			int porte=aleat1(2);
			int initPorte= TABporte[1];
		
			
		int initx;								//////// position X initiale  
		int inity;								//////// position Y initiale

		
		element->entre= initPorte;
		
		if (element->entre==1 || element->entre == 2)
			{
					element->Sortie=0;
			}
				
		//////  PORTE 1
		
		if (element->entre==1)
			{	
						int TABp1[2]={65,152};	//////// position Y initiale pour S1
						int a=aleat1(2);
						
						initx=aleat1(2)+1;				////////// 1 ; 2 ; 3 ; 4 = position initiale X P1
						inity=TABp1[a];				////////// 65 ; 152 = position initiale Y P1
						
						
			
			}
			
			
////// PORTE 2
		
		if (element->entre ==2)
			{
						int TABp2[2]={65,152};	//////// position Y initiale pour S1
						int a=aleat1(2);
						
						int TABxp2[3]={46,47,48};	//////// position Y initiale pour S1
						int xp2=aleat1(3);
						
						initx=TABxp2[xp2];	////////// 47;48;49= position initiale X P1
						inity=TABp2[a];			////////// 65 ; 152 = position initiale Y P1			

						
			}
				
	////////////		GÉNÉRALE		/////////////////////
		
		
							
			element->posx=initx;
			element->posy=inity;
	
				
				
										
				int TABLE[20]={94,95,98,99,100,101,104,105,106,107,110,111,112,113,116,117,118,119,122,123};
				int ch=aleat1(20);
				int Aposx;
				int Aposy = TABLE[ch];
				
				
				if (element->entre == 1 )
					{
						Aposx=24;
						element->Arposx=Aposx;
						
						
					}
				
				
				if (element->entre ==2)
					{
							Aposx= 28;
							element->Arposx=Aposx;
					}
					
				element->Arposy=Aposy;
							
	element->suivant = NULL;
	liste->premier = element;
		//printf("\033[1;1H X a pr coordonee : x = %d  y= %d et souhaite arriver à x=%d et y =%d \n",initx,inity,Aposx,Aposy);
				
	return liste;
}




// Ajoute un voyageur à une liste existante

void insertion(Liste *liste)
{
	
	/* Création du nouvel élément */
	Voyageur *nouveau = malloc(sizeof(*nouveau));
	if (liste == NULL || nouveau == NULL)
	{
		exit(EXIT_FAILURE);
	}
	
	
	char perso='X';
	nouveau->custom = perso;
	
	/////////  COULEUR //////////////////////
	int COLOR[6]={31,32,33,34,35,36};
	int color=aleat1(6);
	nouveau->colour=COLOR[color];
	
		int TABporte[2]={2,1};		////////// Porte 
		int porte=aleat1(2);
		int initPorte= TABporte[porte];
		
			
		int initx;								//////// position X initiale  
		int inity;								//////// position Y initiale

		
		nouveau->entre= initPorte;
		
		if (nouveau->entre==1 || nouveau->entre == 2)
			{
					nouveau->Sortie=0;
			}
					
		//////  PORTE 1
		
		if (nouveau->entre==1)
			{	
						int TABp1[2]={66,151};	//////// position Y initiale pour S1
						int a=aleat1(2);
						
						initx=1+aleat1(3);				////////// 1 ; 2 ; 3 = position initiale X P1
						inity=TABp1[a];				////////// 65 ; 152 = position initiale Y P1
						
						
			
			}
			
			
////// PORTE 2
		
		if (nouveau->entre ==2)
			{
						int TABp2[2]={66,151};	//////// position Y initiale pour S1
						int a=aleat1(2);
						
						
						
						initx=46+aleat1(2)+1;	////////// 47;48;49= position initiale X P1
						inity=TABp2[a];			////////// 65 ; 152 = position initiale Y P1			

						
			}
				



	////////////		GÉNÉRALE		/////////////////////
		
		
							
			nouveau->posx=initx;
			nouveau->posy=inity;
	
				
				
										
				int TAB[20]={94,95,98,99,100,101,104,105,106,107,110,111,112,113,116,117,118,119,122,123};
				int ch=aleat1(20);
				int Aposx;
				int Aposy = TAB[ch];
				
				
				if (nouveau->entre == 1 )
					{
						Aposx=24;
						nouveau->Arposx=Aposx;
						
					}
				
				
				if (nouveau->entre ==2)
					{
							Aposx= 28;
							nouveau->Arposx=Aposx;
					}
	
					nouveau->Arposy=Aposy;

	/* Insertion de l'élément au début de la liste */
	nouveau->suivant = liste->premier;
	liste->premier = nouveau;
	
}




// Ajoute un voyageur ( Sortant du train SUD) à une liste existante
void insertion4(Liste *liste)
{
	
	/* Création du nouvel élément */
	Voyageur *nouveau = malloc(sizeof(*nouveau));
	if (liste == NULL || nouveau == NULL)
	{
		exit(EXIT_FAILURE);
	}
	
	
	char perso='X';
	nouveau->custom = perso;
	
	/////////  COULEUR //////////////////////
	int COLOR[6]={31,32,33,34,35,36};
	int color=aleat1(6);
	nouveau->colour=COLOR[color];
	
	////////// Porte 4 (sortir train sud)
	
		int porte=4;
		int initPorte=porte;
		
			
		int initx;								//////// position X initiale  
		int inity;								//////// position Y initiale

		
		nouveau->entre= initPorte;
					
		if (nouveau->entre== 3 || nouveau->entre == 4)
			{
				 	nouveau->Sortie=1; 
			}
				
				
			
///// PORTE 4 (sortie train 2)
	
	if (nouveau->entre ==4)
			{
						
						int TABp4[20]={94,95,98,99,100,101,104,105,106,107,110,111,112,113,116,117,118,119,122,123};
						int a=aleat1(20);
						
						
						
						initx=28;						////////// 27 position initiale X P4
						inity=TABp4[a];			////////// 65 ; 152 = position initiale Y P4
			
			}

	////////////		GÉNÉRALE		/////////////////////
		
		
							
			nouveau->posx=initx;
			nouveau->posy=inity;
	
				
				
										
				
								

	/* Insertion de l'élément au début de la liste */
	nouveau->suivant = liste->premier;
	liste->premier = nouveau;
	
}


// Ajoute un voyageur ( Sortant du train NORD) à une liste existante
void insertion3(Liste *liste)
{
	
	/* Création du nouvel élément */
	Voyageur *nouveau = malloc(sizeof(*nouveau));
	if (liste == NULL || nouveau == NULL)
	{
		exit(EXIT_FAILURE);
	}
	
	
	char perso='X';
	nouveau->custom = perso;
	
	/////////  COULEUR //////////////////////
	int COLOR[6]={31,32,33,34,35,36};
	int color=aleat1(6);
	nouveau->colour=COLOR[color];
	
	////////// Porte 3 (sortir train sud)
	
		int porte=3;
		int initPorte=porte;
		
			
		int initx;								//////// position X initiale  
		int inity;								//////// position Y initiale

		
		nouveau->entre= initPorte;
					
		if (nouveau->entre== 3 || nouveau->entre == 4)
			{
				 	nouveau->Sortie=1; 
			}
				
				

///// PORTE 3 (sortie train 1)
	
	if (nouveau->entre ==3)
			{
  					int TABp3[20]={94,95,98,99,100,101,104,105,106,107,110,111,112,113,116,117,118,119,122,123};
						int a=aleat1(20);
						
						
						
						initx=24;						////////// 23 position initiale X 
						inity=TABp3[a];			////////// 65 ; 152 = position initiale Y 
			
			}
			

	////////////		GÉNÉRALE		/////////////////////
		
		
							
			nouveau->posx=initx;
			nouveau->posy=inity;
								

	/* Insertion de l'élément au début de la liste */
	nouveau->suivant = liste->premier;
	liste->premier = nouveau;
	
}





// Supprime un voyageur d'une liste et libère l'espace mémoire associé
void suppression(Liste *liste)
{
	if (liste == NULL)
	{
		exit(EXIT_FAILURE);
	}
	
	
Voyageur *actuel;
Voyageur *precedent;

/*
if (liste->premier->posx == liste->premier->Arposx &&  liste->premier->posy == liste->premier->Arposy||liste->premier->posx == 48 && liste->premier->Sortie == 1 ||  liste->premier->posx == 1 && liste->premier->Sortie == 1)
	{
		actuel=liste->premier;
		liste->premier=liste->premier->suivant;
		free(actuel);
	}
	else 
	{
		precedent=liste->premier;
		actuel=liste->premier->suivant;
		while(actuel != NULL)
			{
				if(actuel-> posx == actuel-> Arposx &&  actuel->posy == actuel-> Arposy || actuel->posx == 48 && actuel->Sortie == 1 ||  actuel->posx == 1 && actuel->Sortie == 1)
				{
					precedent->suivant=actuel->suivant;
					free(actuel);
				}
				precedent=actuel;
				actuel=actuel->suivant;
			}
		
	} */
	
	if (liste->premier->posx == liste->premier->Arposx &&  liste->premier->posy == liste->premier->Arposy||liste->premier->posx == 48 && liste->premier->Sortie == 1 ||  liste->premier->posx == 1 && liste->premier->Sortie == 1)
	{
		actuel=liste->premier;
		liste->premier=liste->premier->suivant;
		printf("\033[%d;%dH \n",liste->premier->posx,liste->premier->posy);
		free(actuel);
	}
	 actuel=liste->premier;
	
		precedent=liste->premier;
		actuel=liste->premier->suivant;
		while(actuel-> suivant!= NULL)
			{	
			
			if (liste->premier->posx == liste->premier->Arposx &&  liste->premier->posy == liste->premier->Arposy||liste->premier->posx == 48 && liste->premier->Sortie == 1 ||  liste->premier->posx == 1 && liste->premier->Sortie == 1)
				{
					actuel=liste->premier;
					liste->premier=liste->premier->suivant;
					printf("\033[%d;%dH \n",liste->premier->posx,liste->premier->posy);
					free(actuel);
				
	 				actuel=liste->premier;
	
					precedent=liste->premier;
					actuel=liste->premier->suivant;
			}
				
				if(actuel-> posx == actuel-> Arposx &&  actuel->posy == actuel-> Arposy || actuel->posx == 48 && actuel->Sortie == 1 ||  actuel->posx == 1 && actuel->Sortie == 1)
				{
					precedent->suivant=actuel->suivant;
					printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
					free(actuel);
					actuel=precedent->suivant;
				}
				else 
				{
							precedent=actuel;
							actuel=actuel->suivant;
				}
			}
		
	
	
	
	

}



void deplacement (Liste *liste,int train1_arret,int train2_arret)
{
		Voyageur *actuel=liste->premier;
		while(actuel != NULL)
		{
		///////////////////////////////////////////////
		
		if ( actuel->entre==1)
						{
						

							 if (actuel->posx>= 1 && actuel->posx<=5)
								{
									
										if (actuel->posy<= 103)
											{			
													
												printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
												actuel->posy++;
													
											}
										 
										 if (actuel->posy>= 119)
											{		
												printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
												actuel->posy--;
																						
											}
												
								
								}

									
								if (actuel->posy > 103 && actuel->posy < 119 && actuel->posx<=14 )
								{				
									
									
								
										
									printf("\033[%d;%dH \n",actuel->posx,actuel->posy);

									actuel->posx++;	

									
									
								}
								
									printf("\033[1;%dm\033[%d;%dH%c\n",actuel->colour,actuel->posx,actuel->posy,actuel->custom);
									printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
								
							}
									
		///////////////////////////////////////////////////////////////////////////////////////////////////////							
		
						if ( actuel->entre==2)
						{
			
							 
								 if (actuel->posx>= 46 && actuel->posx<=50)
										{
												
													if (actuel->posy <= 103)
													{			
														
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														actuel->posy++;
														
													}
										 
												 if (actuel->posy>= 119)
													{		
															printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
															actuel->posy--;
																								
													}
				
										
										}

									
										if (actuel->posy > 103 && actuel->posy < 119 && actuel->posx >= 40 )
											{				
															
												printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
												actuel->posx--;	
								
											}	
							
								printf("\033[1;%dm\033[%d;%dH%c\n",actuel->colour,actuel->posx,actuel->posy,actuel->custom);
								printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
						}
								
			
			//////////////////////////	ATTENTE PASSAGER POUR LE TRAIN ////////////////////
				
				if (actuel->Sortie==0) 					
						{	
								
								if ( train1_arret == 0 )  
									{
										
										if (actuel -> entre == 1)
											{				
														
								if ((actuel->posx>=14 && actuel->posx<=22) || (actuel->posx>=29 && actuel->posx<=40) ) 
										{
										
										signed int depla[8]={-1,0,0,1,-1,0,0,1};
										signed int deplaY[12]={-1,-1,0,0,1,0,0,0,1,0,0,0};		
										int c;								//// pos x = pos x + C {-1,0,1}
										int d;								//// pos y = pos y + D {-1,0,1}
										int xrandom=aleat1(8); 
										int yrandom=aleat1(12);
										c=depla[xrandom];
										d=deplaY[yrandom];
																						
										printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
										actuel->posx=actuel->posx+c;
										actuel->posy=actuel->posy+d;	
										
										
									/// Limitation générale mur Droite <-> Gauche
										
										if (actuel->posy == 69 )
											{
												actuel->posy++;
											}
										
										if (actuel->posy == 147 )
											{
												actuel->posy--;
											}
										
									/// Limitation porte 2
										if (actuel->posx == 40)
											{	

												actuel->posx--;
											}
										
										if (actuel->posx == 29)
											{	

												actuel->posx++;
											}	
									
								
								/// Limitation porte 1
										if (actuel->posx == 13)
											{

												actuel->posx++;
											}	
											
										if (actuel->posx == 23 )
											{

												actuel->posx--;
											}		
					
									
										}	
									
									}	
									
								}	
								////////////////////////////////////////////////////////////////
								if (  train2_arret == 0 ) 
									{
											
											if (actuel->entre == 2 )
											{
							
								if ((actuel->posx>=14 && actuel->posx<=22) || (actuel->posx>=29 && actuel->posx<=40) ) 
										{
										
										signed int depla[8]={-1,0,0,1,-1,0,0,1};
										signed int deplaY[12]={-1,-1,0,0,1,0,0,0,1,0,0,0};		
										int c;								//// pos x = pos x + C {-1,0,1}
										int d;								//// pos y = pos y + D {-1,0,1}
										int xrandom=aleat1(8); 
										int yrandom=aleat1(12);
										c=depla[xrandom];
										d=deplaY[yrandom];
																						
										printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
										actuel->posx=actuel->posx+c;
										actuel->posy=actuel->posy+d;	
										
										
									/// Limitation générale mur Droite <-> Gauche
										
										if (actuel->posy == 69 )
											{
												actuel->posy++;
											}
										
										if (actuel->posy == 147 )
											{
												actuel->posy--;
											}
										
									/// Limitation porte 2
										if (actuel->posx == 40)
											{	

												actuel->posx--;
											}
										
										if (actuel->posx == 29)
											{	

												actuel->posx++;
											}	
									
								
								/// Limitation porte 1
										if (actuel->posx == 13)
											{

												actuel->posx++;
											}	
											
										if (actuel->posx == 23 )
											{

												actuel->posx--;
											}		
					
									
									}	
									
									}
									
								}
								////////////////////////////////////////////////
								
					////////////////////////////////////// ENTRÉE PASSAGER ///////////////////					
								
								if ( train1_arret==2) 
									{
										
										
										if (actuel->entre== 1 )
											{	
									

											
												if (actuel->posy < actuel->Arposy)
													{
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														actuel->posy++;
													}
												if (actuel->posy > actuel->Arposy)
													{
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														actuel->posy--;
													}
												if (actuel->posy == actuel->Arposy)
													{
														if (actuel->posx < actuel->Arposx)
															{
																printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																actuel->posx++;
															}
														if (actuel->posx > actuel->Arposx)
															{
																printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																actuel->posx--;
															}
														if (actuel->posx == actuel->Arposx)
															{
																printf("\033[%d;%dH ",actuel->posx,actuel->posy);
																
															}	
													}
													
												
											}
									}			
								
								if ( train2_arret==2) 
									{
										
										
										if (actuel->entre== 2 )
											{	
											
											if (actuel->posy>= 101 && actuel->posy<= 123 && actuel->posx>=38 && actuel->posy<=46)
											{
												
																		printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																		actuel->posx--;
												
											}
											
												else if (actuel->posy < actuel->Arposy)
													{
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														actuel->posy++;
													}
													else	if (actuel->posy > actuel->Arposy)
													{
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														actuel->posy--;
													}
													else if (actuel->posy == actuel->Arposy)
													{
														if (actuel->posx < actuel->Arposx)
															{
																printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																actuel->posx++;
															}
														if (actuel->posx > actuel->Arposx)
															{
																printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																actuel->posx--;
															}
														if (actuel->posx == actuel->Arposx)
															{
																printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																
															}	
													}
											}
									}			
								
								
								
								
								
							}
								
								
						//////////////////  SORTIE TRAIN  //////////////////
							
					
					if (actuel->Sortie==1) 
						{			
						
								if (actuel->entre==3)
										{ 
											
										if(train1_arret==1) 
												{			
											
											if (actuel->posx <= 24 &&  actuel->posx >= 20 )
										 		{
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														actuel->posx--;
												}
										 if (actuel->posx <= 20 )
										 		{
										
															if (actuel->posy <= 102  )
																{	
																	printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																	actuel->posy++;
																}	
																
															if (actuel->posy >= 121 )
																{	
																	printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																	actuel->posy--;
																}
																
														 	if (actuel->posy >= 102 && actuel->posy <= 121  )
																{										
																		
																		if (actuel->posx <= 21 && actuel->posx > 1)	
												
																			{
																					printf("\033[%d;%dH \n",actuel->posx,actuel->posy);								
																					actuel->posx--;
																			}	
																									
																}
											
												}
											
											}																	
										}
							
										
										
							
							
										
									if (actuel->entre==4)
										{ 
												if(train2_arret==1) 
											{
											if (actuel->posx >= 27 &&  actuel->posx < 31 )
										 		{
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														actuel->posx++;
												}
										
											 if (actuel->posx >= 31 )
											 		{
										
															if (actuel->posy <= 102  )
																{	
																	printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																	actuel->posy++;
																}	
																
															if (actuel->posy >= 121 )
																{	
																	printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
																	actuel->posy--;
																}
																
														 	if (actuel->posy >= 102 && actuel->posy <= 121  )
																{										
																		
																		if (actuel->posx >= 31 && actuel->posx <48)	
												
																			{
																					printf("\033[%d;%dH \n",actuel->posx,actuel->posy);								
																					actuel->posx++;
																			}	
																									
																}
											
												}
											
											
											}
													
										}
										
									
													
							
							}
											
										
								
										
											
							
									
									
														
										printf("\033[1;%dm\033[%d;%dH%c\n",actuel->colour,actuel->posx,actuel->posy,actuel->custom);

										
										if (actuel->posx == 48 && actuel->Sortie == 1 ||  actuel->posx == 1 && actuel->Sortie == 1)	
										{		
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
														
										}
										
												if (actuel->posx == actuel->Arposx &&  actuel->posy == actuel->Arposy)	
										{		
														printf("\033[%d;%dH \n",actuel->posx,actuel->posy);
										}						
						




				///////////////////////////////////////////////
				//printf("%c", actuel->custom);
			//	printf("\033[1;%dm\033[%d;%dH%c\n",actuel->colour,actuel->posx,actuel->posy,actuel->custom);
				actuel=actuel->suivant;
		}
}

/*

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

	

int main()
{


	////////////////////////////// PLAN
	char plan []="station";


	
	
	system("clear");

	affichage(plan);
	int timing=0,vitesse=10000000;
	//////////////////////////////////////////////		

	Liste *maliste = initialisation();
	//insertion(maliste);
	int compt_p=0;
	int train=0;
	int train2=2;
	
	int time=0;
	
	int changement=0;
	
	while (1) {
		
		timing=(timing+1)%vitesse;
		if (timing==100)
			{
					//insertion(maliste);

					
					
					if (compt_p < 20)
					{						
									if ( train!=2 && train2!=2)
							{
												insertion(maliste);
						 	}
					
					} 
					
					
					
			
			
			
			
			
					if (compt_p ==300)
							{
								compt_p=0;
							}			
					compt_p++;
				 	
				 	deplacement(maliste,train,train2);
					//suppression(maliste);
					time++;
					
				if (compt_p== 100 || compt_p== 200 || compt_p== 300 )
					{
				   if (train ==2 && train2 ==1)
							{
							
							train =0;
							train2=2;
							
							}
							
						else if (train ==0 && train2 ==2)
							{
								train =1;
								train2=0;
							insertion3(maliste);
							insertion3(maliste);
							insertion3(maliste);
						  insertion3(maliste);
							}
							else if (train ==1 & train2 ==0)
							{
								train =2;
								train2=1;
							insertion4(maliste);
							insertion4(maliste);
							insertion4(maliste);
							insertion4(maliste);
							}
						suppression (maliste);
					}
							
						  
									
							printf("\033[1;1H CHANGEMENT %d : train: %d   train2: %d ",compt_p, train,train2);
							
							
							insertion4(maliste);
							insertion4(maliste);
							insertion4(maliste);
							insertion4(maliste);							
								
							
										
					
			}
		
		}
	return 0;
}
*/
