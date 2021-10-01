

#include "partie2.c"


#define TAILLE_MAX 1000






	char key_pressed()
{
		struct termios oldterm, newterm;
		int oldfd;
		 char c,
		 result = 0;
		tcgetattr (STDIN_FILENO, &oldterm);
		newterm = oldterm;
		newterm.c_lflag &= ~(ICANON | ECHO);
		tcsetattr (STDIN_FILENO, TCSANOW, &newterm);
		oldfd = fcntl(STDIN_FILENO, F_GETFL, 0);
		fcntl (STDIN_FILENO, F_SETFL, oldfd | O_NONBLOCK);
		c = getchar();
		tcsetattr (STDIN_FILENO, TCSANOW, &oldterm);
		fcntl (STDIN_FILENO, F_SETFL, oldfd);
		if (c != EOF)
		{
			ungetc(c, stdin); result = getchar();
		}
return result;
}






void menu() {



		system("clear");
		char presentation[]="presentation";
		char menu[]="Vmenu";
		affichage(presentation);

///////////////////////////////////////////////////////////////////////////////////:
	TRAIN Train1;
	TRAIN Train2;
	TRAIN Train3;
	TRAIN Train4;
	TRAIN Train5;
	TRAIN Train6;
	TRAIN Train7;
	TRAIN Train8;
	TRAIN Train9;
	TRAIN Train10;
	int i;



	char train []=" ███████¦¦███████¦¦██████¦¦██████¦¦██████¦¦████████";

		  //strcpy(copie, chazne); // On copie "train" dans "TrainX.custom" afin de représenter chaque train
		      strcpy(Train1.custom,train);
		      strcpy(Train2.custom,train);
		      strcpy(Train3.custom,train);
		      strcpy(Train4.custom,train);
		      strcpy(Train5.custom,train);
		      strcpy(Train6.custom,train);
		      strcpy(Train7.custom,train);
		      strcpy(Train8.custom,train);
		      strcpy(Train9.custom,train);
		      strcpy(Train10.custom,train);
	int g = 165;

	Train1.posx=40; // numero de ligne dans le terminal
	Train1.posy=g;

	Train2.posx=41;
	Train2.posy=g;

	Train3.posx=42;
	Train3.posy=g;

	Train4.posx=43;
	Train4.posy=g;

	Train5.posx=44;
	Train5.posy=g;

	Train6.posx=45;
	Train6.posy=g;

	Train7.posx=46;
	Train7.posy=g;

	Train8.posx=47;
	Train8.posy=g;

	Train9.posx=48;
	Train9.posy=g;

	Train10.posx=49;
	Train10.posy=g;

	int timing=0,vitesse=4000000;
	int stop = 25;
	int compteur=0;
	char nuage[]="nuage";
	char nuage2[]="nuage2";
	char nuage3[]="nuage3";



		int x=22;
		int y=93;

		char s[]="◼◼◼◼▶";
		//char s[]="🚝🚝";





	 while(1)
	 {

		timing=(timing+1)%vitesse;
		if (timing==100)
		{



			Train1.posy=g;
			Train2.posy=g;
			Train3.posy=g;
			Train4.posy=g;
			Train5.posy=g;
			Train6.posy=g;
			Train7.posy=g;
			Train8.posy=g;
			Train9.posy=g;
			Train10.posy=g;



			if ( compteur <= 40)
				{
			printf("\033[%d;%dH %s=",Train1.posx,Train1.posy,Train1.custom);
			printf("\033[%d;%dH %s ",Train2.posx,Train2.posy,Train2.custom);
			printf("\033[%d;%dH %s ",Train3.posx,Train3.posy,Train3.custom);
			printf("\033[%d;%dH %s ",Train4.posx,Train4.posy,Train4.custom);
			printf("\033[%d;%dH %s ",Train5.posx,Train5.posy,Train5.custom);
			printf("\033[%d;%dH %s ",Train6.posx,Train6.posy,Train6.custom);
			printf("\033[%d;%dH %s ",Train7.posx,Train7.posy,Train7.custom);
			printf("\033[%d;%dH %s=",Train8.posx,Train8.posy,Train8.custom);



			printf("\033[%d;%dH  \n",Train1.posx,Train1.posy);
			printf("\033[%d;%dH  \n",Train2.posx,Train2.posy);
			printf("\033[%d;%dH  \n",Train3.posx,Train3.posy);
			printf("\033[%d;%dH  \n",Train4.posx,Train4.posy);
			printf("\033[%d;%dH  \n",Train5.posx,Train5.posy);
			printf("\033[%d;%dH  \n",Train6.posx,Train6.posy);
			printf("\033[%d;%dH  \n",Train7.posx,Train7.posy);
			printf("\033[%d;%dH  \n",Train8.posx,Train8.posy);
				}

			if ( g!=stop)
				{

					g--;

				}

			if (g == stop)
			{


					if(compteur<40)
					{
						compteur++;
					}




					if(compteur==3)
					{
						system("play -q RATPLogo.mp3 vol 1 &");

					}

					if(compteur==8)
					{
						printf("\033[38;29Hoooo oooOO  ");
						printf("\033[39;28Hoo  ");
					}

					if(compteur==16)
					{
						printf("\033[37;35HOOOOOOO OOOOOOOO ");
					}

					if(compteur==20)
					{
							printf("\033[37;35HOOOOOOO OOOOOOOO ");
					}

					if(compteur==25)
					{
						printf("\033[35;1H ");
						affichage(nuage);
					}

					if(compteur==30)
					{
						printf("\033[32;1H ");
						affichage(nuage2);
					}

					if(compteur==35)
					{
						printf("\033[27;1H ");
						affichage(nuage3);
					}


					if(compteur==40)
					{
						printf("\033[16;1H ");
						affichage2(menu);

						printf("\033[%d;%dH%s \n",x,y,s);
						int key = key_pressed();

						if(key=='A'||key=='z')
						{

								//printf("HAUT\n");
								system("play -q boutton.mp3 vol 1 &");
								printf("\033[%d;1H               \n",x+1);
								printf("\033[%d;%dH        \n",x,y);
								x=22;
								y=93;

						}


						if(key=='B'||key=='s')
						{
							system("play -q boutton.mp3 vol 1 &");

							printf("\033[%d;%dH     \n",x,y);
							printf("\033[%d;1H               \n",x+1);
							x=31;
							y=97;
							//printf("BAS\n");

						}

						if(key == 10)
						{
								if (x==22)
								{
								  mode1();
								}
								if (x==31)
								{
									mode2();
								}
							printf("\033[%d;%dH  FIN  DU GAME \n",x,y +5);

							return 0;
						}



					}


			}








 		}
 	}











}


