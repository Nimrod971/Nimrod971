
#include "station.c"

/*
	T1 = Train1
	T2 = Train2	
*/	
	
		
void mode1 (){

	srand(time(NULL));			
	////////////////////      VOITURE DECOR             ////////////////////	
		
		
							CAR Car1;
							char car1[]="🚖";
							CAR Car2;
							char car2[]="🚔";
							CAR Car3;
							char car3[]="🚍";
							CAR Car4;
							char car4[]="🚖";
							CAR Car5;
							char car5[]="🚍";
							CAR Car6;
							char car6[]="🚖";
							
							strcpy(Car1.custom,car1);
							strcpy(Car2.custom,car2);
							strcpy(Car3.custom,car3);
							strcpy(Car4.custom,car4);
							strcpy(Car5.custom,car5);
							strcpy(Car6.custom,car6);
			
			
			
			Car1.posx=46 ;
			Car1.posy=48 ;
			Car1.pos2x=46;
			Car1.pos2y=165;
			
			Car2.posx=49 ;
			Car2.posy=53 ;
			Car2.pos2x=32 ;
			Car2.pos2y=168 ;
			
			Car3.posx=12 ;
			Car3.posy=48 ;
			Car3.pos2x=12 ;
			Car3.pos2y=170 ;
			
			Car4.posx=17 ;
			Car4.posy=50 ;
			Car4.pos2x=17 ;
			Car4.pos2y=169 ;
			
			Car5.posx=30 ;
			Car5.posy=51 ;
			Car5.pos2x=35 ;
			Car5.pos2y=168 ;
			
			Car6.posx=10 ;
			Car6.posy=47 ;
			Car6.pos2x=42;
			Car6.pos2y=165;
	
		
		
		
		//////////////////           TRAIN SUR DESSINS          ////////////////////////////
	
	
	TRAIN Train1;
	TRAIN Train2; 
	int i;
	int j=1;
	int g=191;
	int compteurarret1=0;
	int compteurarret2=0;
	
	char train []=" ██¦¦████¦¦████¦¦████¦¦████¦¦██ ";
		
//strcpy(copie, chazne); // On copie "train" dans "TrainX.custom" afin de représenter chaque train
		     
		strcpy(Train1.custom,train);
		strcpy(Train2.custom,train); 
	
	
	Train1.posx=25; // numero de ligne dans le terminal
	Train1.posy=3;
	
	Train2.posx=27; // numero de ligne dans le terminal
	Train2.posy= 145;
	
	
	char plan[]="station";	/// plan de la station en txt pour l'affichage
	
	int timing=0,vitesse=10000000;
	int tempsAttenteD=0;
	int tempsAttenteG=0;
	
	
	int StopGD=92;
	int StopDG=92;
	
	
	system("clear");
	affichage(plan);
	
	
	int pos_bar1=91;
	int pos_bar2=124;
	char barr='-';
	char barrV=' ';
	
	printf("\033[23;75H 🔴");

	printf("\033[29;140H🔴");
	
	
	
	
	while (pos_bar1!=125)
	{
		printf("\033[23;%dH%c",pos_bar1,barr);	
		pos_bar1++;			
	}
	
	while (pos_bar2!=90)
	{
		printf("\033[29;%dH%c",pos_bar2,barr);	
		pos_bar2--;			
	}
	
	pos_bar1=91;
	pos_bar2=124;
	
	

	 while(1)
	 {			
		
			timing=(timing+1)%vitesse;
			if (timing==100)
			{
		
		
	
				
				Train1.posy=g;		
				Train2.posy=j;
						
							
					
				wagon(Train1.custom, Train1.posx,Train1.posy,Train2.custom, Train2.posx,Train2.posy);
				
				
				j=TrajetGD (j,StopGD,tempsAttenteG,Train1.posy);		// TRAJET T1
				g=TrajetDG (g,StopDG,tempsAttenteD,Train2.posy);		// TRAJET T2
				
				
				
						if (j==StopGD)
						{
						
						
							compteurarret1=stop1(j,StopGD,compteurarret1);	/// ARRET DU T1
						
						
								if (compteurarret1 >= 5 && compteurarret1 <= 80 )
								{
							
									if (pos_bar1!=125)
									{
										printf("\033[29;%dH%c",pos_bar1,barrV);
											
										pos_bar1++;			
									}	
								}
							
							
							if (compteurarret1 >= 165 )
							{
									if (pos_bar1!=90)
									{
										printf("\033[29;%dH%c",pos_bar1,barr);				
										pos_bar1--;			
									}	
										
							}	
								
								
							if (compteurarret1==230)
							{
									j++;
									compteurarret1=0;
							}
							
							
						}
						
						if(j==5)
						{
							tempsAttenteG=attenteG(j,tempsAttenteG);
						} 
							
						

							
							
							
						
						if (g==StopDG)
					{
						compteurarret2=stop2(g,StopDG,compteurarret2);	/// ARRET DU T2
						
							if (compteurarret2 >= 5 && compteurarret2 <= 80 )
							{
								if (pos_bar2!=90)
								{
									printf("\033[23;%dH%c",pos_bar2,barrV);				
									pos_bar2--;			
								}
								
							}
							
							
							if (compteurarret2 >= 165 )
							{
								if (pos_bar2!=125)
								{
									printf("\033[23;%dH%c",pos_bar2,barr);
										
									pos_bar2++;			
								}		
										
							}
						
						
						if (compteurarret2==230)
						{
							g--;
							compteurarret2=0;
						}
					}
					
					
					
					
						
					
					
					
					
					
					
					if(g==190)
						{
							tempsAttenteD=attenteD(g,tempsAttenteD);	/// TEMPS D'ATTENTE T2
						} 		
						
						
		//////////////////////////////////////////////////////////////////////////////
		////////////////////// 			DÉCORATION VOITURE 			//////////////////////////
		
		
												
					if (Car1.posx==29)
						{	
							printf("\033[%d;%dH   \n",Car1.posx+1,Car1.posy);
							Car1.posx = 19;
						}
					if (Car2.posx==29)
						{	
							printf("\033[%d;%dH   \n",Car2.posx+1,Car2.posy);
							Car2.posx = 19;
						}
					if (Car3.posx==29)
						{	
							printf("\033[%d;%dH   \n",Car3.posx+1,Car3.posy);
							Car3.posx = 19;
						}		
					if (Car4.posx==29)
						{	
							printf("\033[%d;%dH   \n",Car4.posx+1,Car4.posy);
							Car4.posx = 19;
						}
					if (Car5.posx==29)
						{	
							printf("\033[%d;%dH   \n",Car5.posx+1,Car5.posy);
							Car5.posx = 19;
						}		
					if (Car6.posx==29)
						{	
							printf("\033[%d;%dH   \n",Car6.posx+1,Car6.posy);
							Car6.posx = 19;
						}	
						
						
			///////////////////////////////////////////////////////////////////:			
						
						if (Car1.pos2x==20)
						{	
							printf("\033[%d;%dH   \n",Car1.pos2x-1,Car1.pos2y);
							Car1.pos2x = 31;
						}
					if (Car2.pos2x==20)
						{	
							printf("\033[%d;%dH   \n",Car2.pos2x-1,Car2.pos2y);
							Car2.pos2x = 31;
						}
					if (Car3.pos2x==20)
						{	
							printf("\033[%d;%dH   \n",Car3.pos2x-1,Car3.pos2y);
							Car3.pos2x = 31;
						}		
					if (Car4.pos2x==20)
						{	
							printf("\033[%d;%dH   \n",Car4.pos2x-1,Car4.pos2y);
							Car4.pos2x = 31;
						}
					if (Car5.pos2x==20)
						{	
							printf("\033[%d;%dH   \n",Car5.pos2x-1,Car5.pos2y);
							Car5.pos2x = 31;
						}		
					if (Car6.pos2x==20)
						{	
							printf("\033[%d;%dH   \n",Car6.pos2x-1,Car6.pos2y);
							Car6.pos2x = 31;
						}	
						
				///////////////////////////////////////////////////////////////		
						
						
						if (Car1.posx==4)
						{
							printf("\033[%d;%dH   \n",Car1.posx+1,Car1.posy);
							Car1.posx = 46;
						}	
							if (Car2.posx==4)
						{
							printf("\033[%d;%dH   \n",Car2.posx+1,Car2.posy);
							Car2.posx = 46;
						}	
							if (Car3.posx==4)
						{
							printf("\033[%d;%dH   \n",Car3.posx+1,Car3.posy);
							Car3.posx = 46;
						}	
							if (Car4.posx==4)
						{
							printf("\033[%d;%dH   \n",Car4.posx+1,Car4.posy);
							Car4.posx = 46;
						}	
							if (Car5.posx==4)
						{
							printf("\033[%d;%dH   \n",Car5.posx+1,Car5.posy);
							Car5.posx = 46;
						}	
							if (Car6.posx==4)
						{
							printf("\033[%d;%dH   \n",Car6.posx+1,Car6.posy);
							Car6.posx = 46;
						}



		

							if (Car1.pos2x==46)
						{
							printf("\033[%d;%dH   \n",Car1.pos2x-1,Car1.pos2y);
							Car1.pos2x = 4;
						}	
							if (Car2.pos2x==46)
						{
							printf("\033[%d;%dH   \n",Car2.pos2x-1,Car2.pos2y);
							Car2.pos2x = 4;
						}	
							if (Car3.pos2x==46)
						{
							printf("\033[%d;%dH   \n",Car3.pos2x-1,Car3.pos2y);
							Car3.pos2x = 4;
						}	
							if (Car4.pos2x==46)
						{
							printf("\033[%d;%dH   \n",Car4.pos2x-1,Car4.pos2y);
							Car4.pos2x = 4;
						}	
							if (Car5.pos2x==46)
						{
							printf("\033[%d;%dH   \n",Car5.pos2x-1,Car5.pos2y);
							Car5.pos2x = 4;
						}	
							if (Car6.pos2x==46)
						{
							printf("\033[%d;%dH   \n",Car6.pos2x-1,Car6.pos2y);
							Car6.pos2x = 4;
						}

						
							
						
									printf("\033[%d;%dH   \n",Car1.posx+1,Car1.posy);
									voiture(Car1.custom,Car1.posx,Car1.posy);
									
									printf("\033[%d;%dH   \n",Car2.posx+1,Car2.posy);
									voiture(Car2.custom,Car2.posx,Car2.posy);
									
									printf("\033[%d;%dH   \n",Car3.posx+1,Car3.posy);
									voiture(Car3.custom,Car3.posx,Car3.posy);
									
									printf("\033[%d;%dH   \n",Car4.posx+1,Car4.posy);
									voiture(Car4.custom,Car4.posx,Car4.posy);
									
									printf("\033[%d;%dH   \n",Car5.posx+1,Car5.posy);
									voiture(Car5.custom,Car5.posx,Car5.posy);
									
									printf("\033[%d;%dH   \n",Car6.posx+1,Car6.posy);
									voiture(Car6.custom,Car6.posx,Car6.posy);
									
									
									printf("\033[%d;%dH   \n",Car1.pos2x-1,Car1.pos2y);
									voiture(Car1.custom,Car1.pos2x,Car1.pos2y);
									
									printf("\033[%d;%dH   \n",Car2.pos2x-1,Car2.pos2y);
									voiture(Car2.custom,Car2.pos2x,Car2.pos2y);
									
									printf("\033[%d;%dH   \n",Car3.pos2x-1,Car3.pos2y);
									voiture(Car3.custom,Car3.pos2x,Car3.pos2y);
									
									printf("\033[%d;%dH   \n",Car4.pos2x-1,Car4.pos2y);
									voiture(Car4.custom,Car4.pos2x,Car4.pos2y);
									
									printf("\033[%d;%dH   \n",Car5.pos2x-1,Car5.pos2y);
									voiture(Car5.custom,Car5.pos2x,Car5.pos2y);
									
									printf("\033[%d;%dH   \n",Car6.pos2x-1,Car6.pos2y);
									voiture(Car6.custom,Car6.pos2x,Car6.pos2y);
	

					Car1.posx--;
					Car2.posx--;
					Car3.posx--;
					Car4.posx--;
					Car5.posx--;
					Car6.posx--;
					
					Car1.pos2x++;
					Car2.pos2x++;
					Car3.pos2x++;
					Car4.pos2x++;
					Car5.pos2x++;
					Car6.pos2x++;
					
		
		
		
		
		
		///////////////////////////////////////////////////////////////////				
						
						 		
	 		}	
 	}
 	
 	printf("\n\n\n");
 	




}
		

