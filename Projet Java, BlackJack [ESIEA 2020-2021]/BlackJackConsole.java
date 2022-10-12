import java.util.Scanner;
import java.util.Calendar;
import java.util.Date;
import java.text.SimpleDateFormat;
import java.util.LinkedList;

public class BlackJackConsole {

	public BlackJackConsole(){
	
		Deck deck = new Deck(2);
		Hand hand = new Hand();
		Hand playerHand = new Hand();
      		Hand bankHand = new Hand();
      		player player=new player();
		
		
		
		
		System.out.println("Welcome to the BlackJack table. Let's play !");

		
		try{
                    BlackJack blackjack = new BlackJack();
                    blackjack.readScore();
                    Scanner scan = new Scanner(System.in);
                    String choice;

		    System.out.println("The bank draw " +blackjack.getBankHandString() );
		    System.out.println("You draw: " +blackjack.getPlayerHandString()+"\n");

	  	    while (blackjack.isGameFinished()!=true){
			      System.out.println("Do you want another card ? [y/n]");
			      choice = scan.next();
			      
		      	if (choice.charAt(0)== 'y'){
			      blackjack.playerDrawAnotherCard();
			      System.out.println("Your new hand : " +blackjack.getPlayerHandString() );
			      System.out.println("The bank draw cards. New hand : " +blackjack.getBankHandString()+"\n");
		      	} 
		      	
		      	if(choice.charAt(0)== 'n'){
		      	      blackjack.bankLastTurn();
		             System.out.println("The bank draw cards. New hand : " +blackjack.getBankHandString()+"\n");
		      	}
		   }		          			      			System.out.println("Player's hand : "+ blackjack.getPlayerBest());
		System.out.println("Bank's hand : "+ blackjack.getBankBest()+"\n");

          		if(blackjack.isPlayerWinner() == true)
			{
				System.out.println("🏆 Player win the game 🏆 : " + blackjack.getPlayerBest());
		//System.out.println("🏆" +player.getName()+" win the game 🏆 : " + blackjack.getPlayerBest());				
			}
			
			if(blackjack.isBankWinner() == true)
			{
				System.out.println("😥 Bank win the game 😥 : " + blackjack.getBankBest());
			}
		      
				 	
			if (blackjack.isPlayerWinner() == false && blackjack.isBankWinner() == false)
			{
			System.out.println("The Player HAVE MORE : " + blackjack.getPlayerBest()+" points");
				 			System.out.println("The BANK HAVE MORE : " + blackjack.getBankBest()+" points");
				 			System.out.println(" It's a draw!");				 	
			}
				
			blackjack.updateScores();  	
			blackjack.writeScore();
			//System.out.println("\n");
			blackjack.winning();		 	
			blackjack.readScore();
			

			
		     	
		 }catch (EmptyDeckException ex){
		      System.err.println(ex.getMessage());
		      System.exit(-1);
            	   }
        }
        
       
	
	public static void clearScreen() {  
   	 System.out.print("\033[H\033[2J");  
   	 System.out.flush();  
	}  
	
	public static void  reset (){
	

	System.out.println("Do you want to try again ? [y/n]");
	 Scanner scan = new Scanner(System.in);
         String choice;
	choice = scan.next();
	
			      
		      	if (choice.charAt(0)== 'y'){
			       clearScreen();
			      new BlackJackConsole();
			      reset();
		      	} 
		      	
		      	else if(choice.charAt(0)== 'n'){
		      	      System.exit(-1);
		      	}	
		      	else if(choice.charAt(0)!= 'n' && choice.charAt(0)!= 'y'){
			 clearScreen();
			 System.out.println("😤😤 INCORECT ANSWER !! 😤😤 \n😡🤬 ASK THE QUESTION Y or N !😡🤬");
				reset();
		      	}
	
	
		
	
	}
	
	
	
	public static void main(String[] args) {
		
		
         	clearScreen();
		new BlackJackConsole();
		reset();
	} 
}
