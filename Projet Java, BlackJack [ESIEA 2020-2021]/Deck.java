import java.util.LinkedList;
import java.util.Collections;

public class Deck {

	private LinkedList<Card> cardList = new LinkedList<Card>();
	private int nbBox;
	
	public Deck (int nbBox)
	{
		//récupérer les 13 objets qui constituent l'enum Value
		Value[] valuesArray = Value.values();
		//récupérer les 4 objets qui constituent l'enum Color
		Color[] colorsArray = Color.values();
		
		for (int i = 0; i<nbBox; i++){
			for (int j = 0; j<colorsArray.length; j++){
				for (int k = 0; k<valuesArray.length; k++){
					cardList.add(new Card(valuesArray[k], colorsArray[j]));
				}
			}
		}
		Collections.shuffle(cardList);
				
	}

	public Card draw()
		throws EmptyDeckException{
			if (cardList.isEmpty()){
				throw new EmptyDeckException();
			}
			
		return cardList.pollFirst();
		}
		
	public String toString(){
		return cardList.toString();
	}
	
}


