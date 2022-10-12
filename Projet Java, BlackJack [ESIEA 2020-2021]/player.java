// Programme Java pour démontrer la méthode createNewFile() 
  
import java.util.Scanner;
import java.io.File;
import java.io.IOException;

public class player
{	
	
/*public String getName()
	{
		//return main();
	}	
  */ 
	
		

   public static void main(String[] args) 
    { 
     
     try {
       
       System.out.println("First present you ! What's your name ? ");
		Scanner scan = new Scanner(System.in);
         	String Nom;
         	Nom = scan.next();
         	
         	
       File file = new File(Nom);
       
       if (file.createNewFile()){
         System.out.println("Fichier "+Nom+" créé!");
       }else{
         System.out.println("Fichier "+Nom+" existe déjà.");
       }
       
       //return Nom;
       
     } catch (IOException e) 
	{
	       e.printStackTrace();
 	}
    
	

    }
    
  
   
    
}
