using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    [APIAuthorizeAttribute]
    public class Styles_Shops_Products_LoginController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();
        //Sản phẩm đã xem
        public class Styles_Shops_Products_Template_View
        {
            public int ID_Product { get; set; }
            public string LinkSEOCatalog { get; set; }
            public string Link_SEO { get; set; }
            public string ProductName { get; set; }
            public Nullable<int> HitsTotal { get; set; }
            public string Image { get; set; }
            public string PriceType { get; set; }
            public Nullable<double> ProductPrice { get; set; }
            public Nullable<double> ProductDiscounts { get; set; }
            public Nullable<int> MinOfQuantity { get; set; }
            public string UnitName { get; set; }
            public string CompanyName { get; set; }
            public string CurrencyCode { get; set; }
            public Nullable<bool> ServiceOrProduct { get; set; }
            public string UserName { get; set; }
            public Nullable<int> TotalLike { get; set; }
            public Nullable<double> RatingValue { get; set; }
        }
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Shops_Viewed/{idUser}/{top}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Products_Shops_Viewed(int idUser,int top, string lang)
        {
            try
            {
                string strWLP = "0";
                Styles_Users User = db.Styles_Users.Find(idUser);
                if (User.ListProductViewed != "")
                {
                    strWLP = User.ListProductViewed;
                }
                else
                {
                    strWLP = "0";
                }

                var list = db.Database.SqlQuery<Styles_Shops_Products_Template_View>(@"SELECT ServiceOrProduct,Styles_Shops_Sources.*,
            Styles_Shops_Sources_Translation.SourceName, Styles_Shops_Sources_Translation.ID_Source,UserName,MinOfQuantity,PriceType,
            (select CompanyName from Styles_Users where Styles_Users.ID_User = Styles_Shops_Products.UserName) as CompanyName,
        (select CurrencyCode from Styles_Shops_Currencies where Styles_Shops_Currencies.ID_Currency=Styles_Shops_Products.ID_Currency) as CurrencyCode,(select UnitName from Styles_Shops_Units_Translation where Styles_Shops_Units_Translation.ID_Unit=Styles_Shops_Products.ID_Unit and Styles_Shops_Units_Translation.LanguageCode='" + lang + "') as UnitName,HitsTotal,TotalLike,SaleMode,ListPrice,ProductPrice,ProductDiscounts,Image,ProductCode,Styles_Shops_Products_Translation.*,Styles_Shops_Catalogs_Translation.Link_SEO as LinkSEOCatalog"
    + " from Styles_Shops_Sources, Styles_Shops_Sources_Translation, Styles_Shops_Products,Styles_Shops_Catalogs_Translation,Styles_Shops_Products_Translation where Styles_Shops_Products.ID_Source = Styles_Shops_Sources.ID_Source and Styles_Shops_Sources.ID_Source = Styles_Shops_Sources_Translation.ID_Source and Styles_Shops_Sources_Translation.LanguageCode='" + lang + "' and Styles_Shops_Catalogs_Translation.LanguageCode='" + lang + "' and "
    + " Styles_Shops_Products.ID_Product=Styles_Shops_Products_Translation.ID_Product and Styles_Shops_Products_Translation.LanguageCode='" + lang + "'"
    + " and Styles_Shops_Products.ID_Catalog=Styles_Shops_Catalogs_Translation.ID_Catalog  and  (Styles_Shops_Products.ID_Product in (" + strWLP + "))   and Styles_Shops_Products.Active=1 and Styles_Shops_Products.IsInTrash = 0 order by EditTime desc").ToList();
                foreach (Styles_Shops_Products_Template_View d in list)
                {
                    d.RatingValue = (from r in db.Styles_Shops_Product_Ratings
                                     where r.ID_Product == d.ID_Product
                                     select r.Rating).DefaultIfEmpty(0).Average();
                }

                //var list =
                //(from product in db.Styles_Shops_Products

                // join source in db.Styles_Shops_Sources
                // on product.ID_Source equals source.ID_Source

                // join sourceT in db.Styles_Shops_Sources_Translation
                // on source.ID_Source equals sourceT.ID_Source

                // join productT in db.Styles_Shops_Products_Translation
                // on product.ID_Product equals productT.ID_Product

                // join catalogT in db.Styles_Shops_Catalogs_Translation
                // on product.ID_Catalog equals catalogT.ID_Catalog

                // join currencies in db.Styles_Shops_Currencies
                // on product.ID_Currency equals currencies.ID_Currency

                // join unitsT in db.Styles_Shops_Units_Translation
                // on product.ID_Unit equals unitsT.ID_Unit

                // where product.Active == true &&
                // product.IsInTrash == false &&
                // strWLP.Contains(product.ID_Product.ToString())
                // orderby product.EditTime
                // select new
                // {      
                //     Product = product,     
                //     Source = source,
                //     SourceName = sourceT.SourceName,
                //     LinkSEOCatalog = catalogT.Link_SEO,
                //     CurrencyCode = currencies.CurrencyCode,
                //     UnitName = unitsT.UnitName,
                //     RatingValue = (from r in db.Styles_Shops_Product_Ratings
                //                    where r.ID_Product == product.ID_Product
                //                    select r.Rating).DefaultIfEmpty(0).Average()

                // }).Take(top).ToList();

                //var list =
                //    (from product in db.Styles_Shops_Products
                //     where product.Active == true && 
                //     product.IsInTrash == false &&
                //     strWLP.Contains(product.ID_Product.ToString())
                //     orderby product.EditTime 
                //     select product
                //     ).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Đánh giá sản phẩm
        [HttpPost]
        [Route("api/PostStyles_Shops_Product_Ratings/{idUser}/{idProduct}/{rating}")]
        public HttpResponseMessage PostStyles_Shops_Product_Ratings(int idUser, int idProduct, int rating)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int idStore = Convert.ToInt32(styles_Shops_Products.UserName);
                int ID = (from f in db.Styles_Shops_Product_Ratings
                          where f.ID_User == idUser && f.ID_Product == idProduct
                          select f.ID).ToList().FirstOrDefault();
                Styles_Shops_Product_Ratings updateShops_Product_Ratings = db.Styles_Shops_Product_Ratings.Find(ID);
                if (updateShops_Product_Ratings != null)
                {
                    updateShops_Product_Ratings.Rating = Convert.ToInt32(rating);
                    updateShops_Product_Ratings.AddTime = DateTime.Now;
                    db.Entry(updateShops_Product_Ratings).State = EntityState.Modified;
                    db.SaveChanges();
                }
                else
                {
                    Styles_Shops_Product_Ratings insertShops_Product_Ratings = new Styles_Shops_Product_Ratings();
                    insertShops_Product_Ratings.ID_Product = idProduct;
                    insertShops_Product_Ratings.ID_Store = idStore;
                    insertShops_Product_Ratings.ID_User = idUser;
                    insertShops_Product_Ratings.ID_Parent = 0;
                    insertShops_Product_Ratings.Note = ""; ;
                    insertShops_Product_Ratings.Rating = rating;
                    insertShops_Product_Ratings.AddTime = DateTime.Now;
                    insertShops_Product_Ratings.Hidden = false;
                    db.Styles_Shops_Product_Ratings.Add(insertShops_Product_Ratings);
                    db.SaveChanges();

                }

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = "",
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }



    }
}