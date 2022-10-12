import java.util.List;
import java.util.Scanner;
import java.io.FileReader;
import java.io.BufferedReader;
import java.io.FileWriter;
import java.io.BufferedWriter;
import java.io.IOException;


public class BlackJack {

	private Deck deck;
	private Hand playerHand;
	private Hand bankHand;
	private boolean gameFinished;
	private int playerScore;
	private int bankScore;
	private  String SCORE_FILENAME = HighScore();
	
	public BlackJack() {
		try{
			deck= new Deck(2);
		  	playerHand = new Hand();
		  	bankHand = new Hand();
		  	gameFinished = false;
		  	reset();
		}	
		catch(EmptyDeckException ex){
		  	System.out.println("empty deck");
		}
	}

	public void reset()
		throws EmptyDeckException{
			bankHand.clear();
			playerHand.clear();
			bankHand.add(deck.draw());
			playerHand.add(deck.draw());
			playerHand.add(deck.draw());
		} 
	
	public String getPlayerHandString(){
		return playerHand.toString();
	}
	
	public String getBankHandString(){
		return bankHand.toString();
	}
	
	public int getPlayerBest(){
		return playerHand.best();
	}
	
	public int getBankBest(){
		return bankHand.best();
	}
	
	public boolean isPlayerWinner(){
		if (isGameFinished() && getPlayerBest()<= 21 && getPlayerBest() > getBankBest() || getBankBest() > 21)
		{
			return true;
		}
		else return false;
	}
	
	public boolean isBankWinner(){
		if (isGameFinished() && getBankBest()<= 21 && getBankBest() > getPlayerBest() || getPlayerBest()>21)
		{
			return true;
		}
			else return false;
	}
	
	public boolean isGameFinished(){
		if(gameFinished){
			return true;
		}
		else return false;
	
	}
	
	public void playerDrawAnotherCard()
		throws EmptyDeckException{
			if(isGameFinished()==false){
				playerHand.add(deck.draw());
			}
			if(getPlayerBest()>21){
				gameFinished = true;
			}
		}
	
	public void bankLastTurn()
		throws EmptyDeckException{
			if(isGameFinished()==false && getPlayerBest()<=21 && getBankBest()<21 || getPlayerBest()>21){
					while(getBankBest()<getPlayerBest()){
						bankHand.add(deck.draw());
					}
					gameFinished = true;
				}
			}

		
	public void updateScores(){
		if(isBankWinner() == true)
		{
			bankScore = bankScore + 1;
			System.out.println("The Bank's Score is : "+ bankScore);
		}
		else if(isPlayerWinner() == true)
		{	
			playerScore = playerScore + 1;
			System.out.println("The Player's Score is : "+playerScore);
		}
		
	}
	
	//Attribut ne prend pas de()
	//Méthode prend des()
	
	public void writeScore(){
		try (BufferedWriter bw = new BufferedWriter(new FileWriter(SCORE_FILENAME)))
		{	

			System.out.println("\n\n HIGHSCORE : \n");             		
			String content = "Player : "+ playerScore+ "\n" + "Bank : "+ bankScore;

             		bw.write(content);
             		
             		bw.close();
		} 
		catch (IOException e)
		{
		  e.printStackTrace();
		} 
	}
	
	public void winning(){
	
		try (BufferedReader bufferedreader = new BufferedReader(new FileReader(SCORE_FILENAME)))
		{	

			if( playerScore > bankScore)
			{
			 System.out.println("\n BANK IS LOSING !!  YOU ARE WINNING !!! CONTINUE 🏆🏆 \n"); 	
			}
			else if( playerScore < bankScore)
			{
			 System.out.println("\n BANK IS WINNING !!! YOU ARE LOSING LOOSER !!! HURRY UP !!! 👎👎  \n"); 	
			}
			else if( playerScore == bankScore)
			{
			 System.out.println("\n IT'S A DRAW... WHO WILL BE THE NEXT WINNING AND WILL TAKE THE LEAD ? 👀👀  \n"); 	
			}
		} 
		catch (IOException e)
		{
		  e.printStackTrace();
		} 
	
	
	
	}
	
	public String HighScore (){
	
	  System.out.println("Veuillez entrer votre nom afin de charger le tableau HIGHSCORE");
	  Scanner scan = new Scanner(System.in);
          String choice;
          choice = scan.next();
	  return choice;
          
	
	
	
	}
	
	public void readScore(){
	try (BufferedReader bufferedreader = new BufferedReader(new FileReader(SCORE_FILENAME)))
	{
      		String strCurrentLine;
      		int []TAB=new int[2];
      		int a=0;
      		int resultat;
      		
      		while ((strCurrentLine = bufferedreader.readLine()) != null)
      		{
     			String score[] = strCurrentLine.split(" "); 
			resultat = Integer.parseInt(score[2]);
		 	TAB[a]=resultat;
		 	a++;	 	 
     		}
    		System.out.println("Player : "+ TAB[0]);
    	        System.out.println("Bank : "+ TAB[1]+"\n");
    		playerScore= TAB[0];
    		bankScore= TAB[1];
    	} 
    		catch (IOException ioe)
    		{
      			//ioe.printStackTrace();
      			  System.out.println("\n Welcome NEW CHALLENGER !! \n");
   		}
        }
}
