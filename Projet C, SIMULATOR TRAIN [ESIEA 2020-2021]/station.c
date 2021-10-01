
#include"base.c"



/////////////////////////////////	  TRAIN SUR DESSINS        ////////////////////////////////////////////////
	
	

	/////////////// TRAIN G->D  HORS STATION PASSAGER  ////////////////

int TrajetGD (int j,int STOP, int tempsAttenteG,int Train1posy)
{
   				
	if (j!= STOP && tempsAttenteG==0)	
		{				
		 	j++;	
			if (j==182)
			{	
	 			Train1posy=1 ;
	 			j=Train1posy;
		 	}
			 			 					 	
		}
	return j;
				
}
	
			/////////////////// TRAIN G->D STATION PASSAGER ARRRET   ///////////////////
	
int stop1 (int j, int STOP, int compteurarret1) 
{	
	

	if (j==STOP)				
		{	
			
			if (compteurarret1 == 8 )
	 			{	

						
						system("play -q ouverture.mp3 vol 1 &");					
					
				}
			
			if (compteurarret1 == 42 )
	 			{	

						printf("\033[29;140H🟢");

					
				}
				
			if (compteurarret1 == 130 )
				{
					printf("\033[29;140H🟠");
					system("play -q fermeture-metro.mp3 vol 1 &");
								
				}
				
			if (compteurarret1 == 210 )
				{	
					
					printf("\033[29;140H🔴");
					
				} 
				
			compteurarret1++;
				
			if (compteurarret1 == 	230 )
				{
					compteurarret1=230;
				}
				
				return compteurarret1;
		}
}
		
				/////////////// TEMPS D'ATTENTE next TRAIN G -> D //////////////
	
int attenteG (int j, int tempsAttenteG)
{
	int waitG;		
	if(j==5) 
		{	 			
	 		if (tempsAttenteG==0) 
			{
				tempsAttenteG=aleat();
	 			 tempsAttenteG=tempsAttenteG *20; 			
	 		}
		 	else 
		 	{
		 		tempsAttenteG--;
		 		waitG = tempsAttenteG /20;
		 	 	printf("\033[1;37m\033[30;142H %d min\n",waitG);
		 		 	
		 		 	if (tempsAttenteG==0)
		 		 	{
				 		j++;
		 		 	}
		 	}	
		 			 		
		}

return tempsAttenteG;
}
	

	/////////////// TRAIN D->G  HORS STATION PASSAGER  ////////////////

int TrajetDG (int g,int STOP, int tempsAttenteD,int Train2posy)
{
   				
	if (g!= STOP && tempsAttenteD==0)	
		{				
		 	g--;	
			if (g==5)
			{	
	 			Train2posy=190 ;
	 			g=Train2posy;
		 	}
			 			 					 	
		}
	return g;
				
}
	
			/////////////////// TRAIN D->G STATION PASSAGER ARRRET   ///////////////////
	
int stop2 (int g, int STOP, int compteurarret2) 
{	
	
	//int pos_bar=90;			
	if (g==STOP)				
		{	
			if (compteurarret2 == 8 )
	 			{


					system("play -q ouverture.mp3 vol 1 &");					
				}
			
			if (compteurarret2 == 42 )
	 			{	

						printf("\033[23;75H 🟢");

					
				}
				
				if (compteurarret2 == 130 )
				{
					printf("\033[23;75H 🟠");
					system("play -q fermeture-metro.mp3 vol 1 &");
					
				}
				
				if (compteurarret2 == 210 )
				{	
					
					printf("\033[23;75H 🔴");
					
				} 
				
				compteurarret2++;
				
				if (compteurarret2 == 	230 )
				{
					compteurarret2=230;
				}
				
				return compteurarret2;
		}
}
		
				/////////////// TEMPS D'ATTENTE next TRAIN D -> G //////////////
	
int attenteD (int g, int tempsAttenteD)
{
	int waitD;		
	if(g==190) 
		{	 			
	 		if (tempsAttenteD==0) 
			{
				tempsAttenteD=aleat();
	 			 tempsAttenteD=tempsAttenteD *20; 			
	 		}
		 	else 
		 	{
		 		tempsAttenteD--;
		 		waitD = tempsAttenteD /20;
		 	 	printf("\033[1;37m\033[22;69H %d min\n",waitD);
		 		 	
		 		 	if (tempsAttenteD==0)
		 		 	{
				 		g--;
		 		 	}
		 	}	
		 			 		
		}

return tempsAttenteD;
}
	
			
	/////////////////////////////////	  VOITURE SUR DESSINS        ////////////////////////////////////////////////
	
	

	
			
void voiture(char car1[],int car1posx,int car1posy) 
{
	
		
			////////////	 AFFICHAGE Voiture SUR LE TERMINAL	 //////////////////
					 		

			printf("\033[%d;%dH %s\n",car1posx, car1posy,car1);

	
}
	

