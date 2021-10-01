package com.esiea.musichub.util;

import org.apache.log4j.Logger;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import java.io.File;
import java.io.IOException;


public class XMLHandler {
    final static Logger logger = Logger.getLogger(XMLHandler.class);
    TransformerFactory transformerFactory;
    Transformer transformer;
    DocumentBuilderFactory documentFactory;
    DocumentBuilder documentBuilder;

    public XMLHandler() {
        try {
            transformerFactory = TransformerFactory.newInstance();
            transformer = transformerFactory.newTransformer();
            documentFactory = DocumentBuilderFactory.newInstance();
            documentBuilder = documentFactory.newDocumentBuilder();
        } catch (TransformerException tfe) {
            tfe.printStackTrace();
            logger.error(tfe);
        } catch (ParserConfigurationException pce) {
            pce.printStackTrace();
            logger.error(pce);
        }
    }

    public void createXMLFile(Document document, String filePath) {
        try {
            // create the xml file
            //transform the DOM Object to an XML File
            DOMSource domSource = new DOMSource(document);
            StreamResult streamResult = new StreamResult(new File(filePath));

            // If you use
            // StreamResult result = new StreamResult(System.out);
            // the output will be pushed to the standard output ...
            // You can use that for debugging

            transformer.transform(domSource, streamResult);

        } catch (TransformerException tfe) {
            tfe.printStackTrace();
            logger.error(tfe);
        }
    }

    public Document createXMLDocument() {
        return documentBuilder.newDocument();
    }

    public NodeList parseXMLFile(String filePath) {
        NodeList elementNodes = null;
        try {
            Document document = documentBuilder.parse(new File(filePath));
            Element root = document.getDocumentElement();

            elementNodes = root.getChildNodes();
        } catch (SAXException e) {
            e.printStackTrace();
            logger.error(e);
        } catch (IOException e) {
            e.printStackTrace();
            logger.error(e);
        }
        return elementNodes;
    }


}
