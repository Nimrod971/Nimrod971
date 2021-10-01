package com.esiea.musichub.network;

import com.esiea.musichub.business.MusicHub;
import com.esiea.musichub.model.Song;
import com.esiea.musichub.network.server.AbstractServer;
import com.esiea.musichub.network.server.FirstServer;
import com.esiea.musichub.util.NoAlbumFoundException;
import org.junit.Test;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.util.List;

import static org.junit.Assert.assertEquals;

public class jMusicHubTest {

    @Test
    public void BasicConversationTest() throws IOException, ClassNotFoundException, NoAlbumFoundException {
        MusicHub musicHub = new MusicHub();
        Thread serverThread = new Thread(() -> {
            AbstractServer as = new FirstServer();
            as.connect("localhost");
        });
        serverThread.start();


        int PORT = 6666;

        Socket client = new Socket("localhost", PORT);
        ObjectOutputStream output = new ObjectOutputStream(client.getOutputStream());
        ObjectInputStream input = new ObjectInputStream(client.getInputStream());


        output.writeObject("send me the list of available commands!");
        assertEquals((List<String>) input.readObject(), musicHub.availableCommands());

        output.writeObject("t");
        assertEquals((String) input.readObject(), musicHub.getAlbumsTitlesSortedByDate());
        assertEquals((List<String>) input.readObject(), musicHub.availableCommands());

        output.writeObject("u");
        assertEquals((String) input.readObject(), musicHub.getAudiobooksTitlesSortedByAuthor());
        assertEquals((List<String>) input.readObject(), musicHub.availableCommands());


       /* output.writeObject("d");
        assertEquals((String) input.readObject(), "Songs of an album will be displayed; enter the album name, available albums are:");
        assertEquals((String) input.readObject(), musicHub.getAlbumsTitlesSortedByDate());
        output.writeObject("ABBA Gold");
        assertEquals((String) input.readObject(), "list");
        assertEquals((List<Song>) input.readObject(), musicHub.getAlbumSongs("ABBA Gold"));
        assertEquals((List<String>) input.readObject(), musicHub.availableCommands());*/

        client.close();


    }


}
