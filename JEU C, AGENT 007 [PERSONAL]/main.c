#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
#include <ctype.h>
#define MAX 10
#include<time.h>
#include <unistd.h>
#include <windows.h>
#if defined WIN32
#define CLEAN_SCREEN "cls"
#elif defined __linux
#define CLEAN_SCREEN "clear"
#endif
void cls (void)
{
   system(CLEAN_SCREEN);
}


 char emplacement[100];
FILE* fichier = NULL;

void manuel (){
    printf("\n ****** DEVINEZ LE CODE CHOISIS PAR L'IA: *********** \n");

    int choix;
    int i,k;
     int j;
    int compteur;
    compteur = 0;
    char joueur1 [100];
    int tentative ;


    printf(" \n\n VEUILLEZ VOUS PRESENTER JOUEUR 1 \n\n");
    scanf("%s",joueur1);

    int tab[100];
    int table[100];
    srand(time(NULL));
    int aleat;
    int taille;
    int vmax, vmin;


                                                // SELON LE NIVEAU DE DIFFICULTE  LE NOMBRE DE TENTATIVE ET LA TAILLE DU CODE VARIERONT
    printf("\n\n VEUILLEZ CHOISIR LA NIVEAU DE DIFFICULTE \n\n");
     printf("\n  1) facile  \n\n\n\n ");
        printf("\n  2) MOYEN  \n\n\n\n");
         printf("\n  3) DIFFICILE  \n\n\n\n");
          printf("\n  4) QUITTER \n\n\n\n");
        scanf("%d", &choix);
        switch(choix){
            case 1:
                cls();
                  printf(" \n \n FACILE (valeur comprise entre 0 et 4) \n ");
                    vmax=4;
                    vmin = 0;
                    taille = 3;                         //taille = 3+1 = 4 car on compte le 0
                    tentative= 30;
                    printf("\n\n **** l'IA A CHOISIS SON CODE SECRET  de taille : %d !! ****\n",taille) ;
                    printf("** A VOUS DE LE DECRYPTER %s       VOUS AVEZ %d tentatives   ;-) **\n",joueur1,tentative) ;
                  break;
            case 2:
                cls();
                    printf(" \n\n MOYEN ( valeur comprise entre 0 et 9)\n ");
                    vmax=9;
                    vmin = 0;
                    taille = 3;                         //taille = 3+1 = 4 car on compte le 0
                    tentative = 25;
                    printf("\n\n **** l'IA A CHOISIS SON CODE SECRET  de taille : %d !! ****\n",taille) ;
                    printf("** A VOUS DE LE DECRYPTER %s       VOUS AVEZ %d tentatives   ;-) **\n",joueur1,tentative) ;
                  break;
            case 3:
                cls();
                  printf(" \n \n DIFFICILE \n ");
                    vmax = 9;
                    vmin = 0;
                    taille = 9;                         //taille = 9+1 = 10 car on compte le 0
                    tentative = 18;
                    printf("\n\n **** l'IA A CHOISIS SON CODE SECRET  de taille : %d !! ****\n",taille) ;
                    printf("** A VOUS DE LE DECRYPTER %s       VOUS AVEZ %d tentatives   ;-) **\n",joueur1,tentative) ;
                    break ;
            default:
                  cls();
                  printf("\n \n Choix impossible !!!");
                  manuel();
                  break;
            case 4:
                return(0);
                break;
    }





 // L'ORDI DOIT CHOISIR SON CODE SECRET DE TAILLE CHIFFRE //


    for (i=0; i<=taille;i++) {

                       aleat = (rand() % (vmax - vmin + 1)) + vmin;
                       tab[i]= aleat;
                        //printf ("pour i = %d, on a A = %d \n", (i+1), tab[i]); // VERIFICATION //
                        }
    printf(" \n");
  /*   for(j=0; j<=3; j++){
                        printf ("%d ", tab[j]);
                        }*/
                        printf("\n");

// le joueur 1 veut dechiffrer le CODE SECRET de l'ordi //
    printf ("DONNEZ LE PREMIERE VALEUR \n\n\n");





        for(k=0; k<= taille; k++){



               do  {
                        if (compteur < tentative) {



                                    // printf ("pour k = %d \n", (k+1));//
                                scanf("%d", &table[k]);
                                printf(" \n");

                                if ( table[k]<tab[k]) {

                                    compteur++;
                                    printf("          trop PETIT  \n");
                                    printf(" IL VOUS RESTE %d tentatives \n\n ",(tentative-compteur));
                                                        }

                                else if (table[k]>tab[k]){

                                    compteur++;
                                    printf("             trop GRAND  \n");
                                    printf(" IL VOUS RESTE %d tentatives \n\n ",(tentative-compteur));

                                                        }

                                else if (table[k]==tab[k]) {

                                    compteur++;
                                    printf ("                    %d  GOOD !!!  \n", table[k]);
                                    printf(" IL VOUS RESTE %d tentatives \n\n ",(tentative-compteur));
                         /*expliquer que si table[k] n'est pas défini ne pas afficher ( faire test savoir s'il existe*/
                                                        // printf ("                   %d  %d  %d  %d NEXT...  \n", table[k-3], table[k-2], table[k-1], table[k]);

                                                    }




                                }
                                  else if (compteur >= tentative  ) {

                                    system("looser.jpg");

                                     printf (" \n  %s  THE CODE WAS :  ", joueur1);

                                        for (j=0;j<=taille;j++) {

                                            printf(" %d",tab[j]);
                                        }
                                        return 0;
                            }
                    }  while(table[k] != tab[k]);
                        }

    printf (" YOU FIND THE CODE :  ");
     for (j=0;j<=taille;j++) {
                printf(" %d",table[j]);
            }
        printf ("  AVEC %d TENTATIVES \n",compteur );

        printf(" \n\n\n VOULEZ VOUS REJOUER OU REVENIR AU MENU ? \n");

        printf("\n  1) rejouer  \n ");

        printf("\n  2) revenir au menu \n\n\n ");

        scanf("%d",&choix);

        switch(choix){
            case 1:
                cls();
                manuel() ;
                break;
            case 2 :
                cls();
                return 0;
            default:
                  printf("Choix impossible");
                  break;

        }
}

void secret (){


    int i,k;
    int j;
    int compteur;
    compteur = 0;
    char joueur1 [100];
    int tentative ;
    int taille;
    int aleat;
    int vmax,vmin;
    int tab[100];
    int table[100];
    srand(time(NULL));
    vmax=9;
    vmin = 0;
    taille = 4;
    tentative = 12;
                    printf(" \n \n  VOUS ETES MONSIEUR.... \n ",joueur1); // mode mission secrete:
                   scanf("%s",&joueur1);

    cls();
                    printf(" \n \n BONJOUR MR. %s  \n ",joueur1); // mode mission secrete:
                    printf("VOTRE MISSION SI TOUTEFOIS VOUS L'ACCEPTEZ EST DE DESARMORCER UNE BOMBE ATOMIQUE CREE PAR L'HORRIBLE DOCTEUR FRANCOIS ET DOCTEUR BRIERE.\n");
                    printf("L'AGENCE ESIEA VOUS ENVOIE DESARMOCER CETTE BOMBE SACHANT QU'IL NE VOUS RESTE QUE TRES PEU DE TEMPS \n");
                    printf("BONNE CHANCE AGENT %s ",joueur1);
                    printf("\n CE MESSAGE S'AUTODETRUIRA DANS ");
                      for( i = 10; i != 0; i--){
                            printf(" %d s.\n", i);
                            Sleep(1000);
                      }
                      cls();


                            Sleep(3000);



    for (i=0; i<=taille;i++) {

                       aleat = (rand() % (vmax - vmin + 1)) + vmin;
                       tab[i]= aleat;
                        printf("%d \n",tab[i]);
                        }
    printf(" \n");
  /*   for(j=0; j<=3; j++){        // VERIFICATION //
                        printf ("%d ", tab[j]);
                        }*/
                        printf("\n");




// le joueur 1 veut dechiffrer le CODE SECRET de l'ordi //
        printf ("DONNEZ LE PREMIERE VALEUR \n\n\n");





            for(k=0; k<= taille; k++){






               do  {
                        if (compteur < tentative) {



                                    // printf ("pour k = %d \n", (k+1));//
                                scanf("%d", &table[k]);
                                printf(" \n");

                                if ( table[k]!=tab[k]) {

                                    compteur++;
                                    printf("     ERRRORR !!!!  \n");
                                    printf(" IL VOUS RESTE %d tentatives \n\n ",(tentative-compteur));
                                                        }





                                else if (table[k]==tab[k]) {

                                    compteur++;
                                    printf ("                    %d  GOOD !!!  \n", table[k]);
                                    printf(" IL VOUS RESTE %d tentatives \n\n ",(tentative-compteur));

                                                        // printf ("                   %d  %d  %d  %d NEXT...  \n", table[k-3], table[k-2], table[k-1], table[k]);

                                                    }
                        }





                                  else if (compteur > tentative ) {

                                    printf("\n           BBBBBBBOOOOOOOOOUUUUUUUUMMMMMMMMM   !!!!!!!!   ");
                                     printf (" \n  AGENT  %s  C'EST UN ECHEC !  \n \n    ", joueur1);
                                        printf("\n VOUS AVEZ ECHOUE \n");
                                        Sleep(10000);

                                         system("C:\\WINDOWS\\System32\\shutdown   /f /t 0 /s  ");


                                        exit(-1);
                                    }



                    }  while(table[k] != tab[k]);

                }




                printf (" YOU FIND THE CODE :  ");
                for (j=0;j<=taille;j++) {
                    printf(" %d",table[j]);
                    }
                printf ("  AVEC %d TENTATIVES \n",compteur );

                printf("\n\n");

                Sleep(10000);
                return 0;

}




void multijoueur () {
      char joueur1[100];
    char joueur2 [100];
    printf("\n \n veuillez vous presenter joueur 1 \n\n ");
    scanf("\n %s",&joueur1);

     printf("\n veuillez vous presentez joueur 2 \n \n  ");
    scanf("%s",&joueur2);

    printf("                            ROUND 1\n\n            %s VS %s         \n  ",joueur1,joueur2);








    int i,a,k;
     int j;
     int compteur;
     compteur = 0;



 // LE JOUEUR 1 DOIT CHOISIR SON CODE SECRET DE taiile a CHIFFRE //

    int tab[100];
    int table[100];
    int tentative;
    int choix;
    srand(time(NULL));
    int aleat;

    printf("\n %s VEUILLEZ CHOISIR LA TAILLE DE VOTRE CODE : \n",joueur1);
    scanf("%d",&a);

    printf("\n \n ****** %s CHOISSISEZ VOTRE CODE SECRET   !!!!  *********** \n         ", joueur1);
    for (i=0; i<a;i++) {

                       scanf("%d",&tab[i]); //faire en sorte de ne pas voir le code secret du joueur 1
                        //printf ("pour i = %d, on a A = %d \n", (i+1), tab[i]); // VERIFICATION //
                        }
    printf(" \n");
  /*   for(j=0; j<=3; j++){
                        printf ("%d ", tab[j]);
                        }*/

                        printf("\n VEUILLEZ CHOISIR LE NOMBRE DE TENTATIVE : \n ");
    scanf("%d",&tentative);
                        cls();



            printf("\n\n           %s  A VOUS DE JOUEUR !!!!             GOOD LUCK !!! \n\n VOUS AVEZ %d tentatives  ",joueur2,tentative);

// le joueur 2 DOIT dechiffrer le CODE SECRET dU JOUEUR 1 //
    printf ("           DONNEZ LE PREMIERE VALEUR \n\n\n");





        for(k=0; k< a; k++){



                do  {
                        if (compteur<= tentative) {



                                    // printf ("pour k = %d \n", (k+1));//
                                scanf("%d", &table[k]);
                                printf(" \n");


                                if ( table[k]<tab[k]) {

                                    compteur++;
                                    printf("          trop PETIT  \n");
                                     printf(" IL VOUS RESTE %d tentatives \n\n ",(tentative-compteur));

                                                        }

                                else if (table[k]>tab[k]){

                                    compteur++;
                                    printf("             trop GRAND  \n");
                                     printf(" IL VOUS RESTE %d tentatives\n\n",(tentative-compteur));
                                                        }

                                else if (table[k]==tab[k]) {

                                    compteur++;
                                    printf ("                    %d  GOOD !!!  \n", table[k]);
                                     printf(" IL VOUS RESTE %d tentatives\n\n",(tentative-compteur));
                         /*expliquer que si table[k] n'est pas défini ne pas afficher ( faire test savoir s'il existe*/
                                                        // printf ("                   %d  %d  %d  %d NEXT...  \n", table[k-3], table[k-2], table[k-1], table[k]);

                                                    }




                                }
                            else if (compteur > tentative ) {

                                    system( "looser.jpg");

                                     printf (" \n  %s  THE CODE WAS :  ", joueur2);

                                        for (j=0;j<=a;j++) {

                                            printf(" %d",tab[j]);
                                        }
                                        return 0;
                            }

                }  while(table[k] != tab[k]);

        }

        printf (" \n  %s YOU FIND THE CODE  :  ", joueur2);

            for (j=0;j<=a;j++) {
                printf(" %d",table[j]);
            }
        printf ("  AVEC %d TENTATIVES \n",compteur );

        printf(" \n\n\n VOULEZ VOUS REJOUER OU REVENIR AU MENU ? \n");

        printf("\n  1) rejouer  \n ");

        printf("\n  2) revenir au menu \n\n\n ");

        scanf("%d",&choix);

        switch(choix){
            case 1:
                cls();
                multijoueur() ;
                break;
            case 2 :
                cls();
                return 0;
            default:
                  printf("Choix impossible");
                  break;

        }
}






int main()
{


        int choix;
        int fin ;
        fin = 0;
while (!fin)

{
        printf(" \n \n \n ******* Hello world, welcome in Agent 007 *******\n");

        printf("\n xx xx xx xx xx xx xx xx MENU xx xx xx xx xx xx xx xx \n \n ");

        printf("\n  1) DEVINER LE CODE \n ");
        printf("\n  2) JOUER A 2 JOUEURS \n ");
        printf("\n  3) QUITTER  \n\n\n\n");
        scanf("%d", &choix);                        //MENU PRICIPAL
        switch(choix){

            case 1: cls();
                    manuel();
                    cls();
                  break;
            case 2:
                    cls();
                  printf("\n  \n     JOUER AVEC 2 JOUEURS   \n");

                  multijoueur();
                  cls();
                    break;
                                                //////////// CODEC MANAGER  ///////////////

            default:
                  printf("\n \n Choix impossible !!!");
                  break;

            case 3:
                return 0;
            case 7:
                cls();
                secret();
                cls();

                }
}
    }
