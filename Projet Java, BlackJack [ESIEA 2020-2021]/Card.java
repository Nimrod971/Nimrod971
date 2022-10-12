public class Card {
	
	private Value value;
	
	private Color color;
	
	public Card(Value v, Color c)
	{
		this.value = v;
		this.color = c;
	}
	
	public String toString()
	{
		return value.getSymbole() +" "+ color.getSymbole()+" ";
	}
	
	public String getColorSymbole()
	{
		return color.getSymbole();
	}
	
	public String getColorName()
	{
		return color.name();
	}
	
	public String getValueSymbole()
	{
		return value.getSymbole();
	}
	
	public int getPoints()
	{
		return this.value.getPoints();
	}
}
